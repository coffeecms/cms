<?php

class Database {
	public $dbGroup = 'default';
	public $dbConnect = '';
	public $error = '';
	public $is_cache = false;

	// Seconds
	public $cache_time = 60;

	public $db = array(
		'default' => array(
			'DSN' => '',
			'hostname' => 'localhost',
			'username' => 'root',
			'password' => '',
			'database' => 'coffeecms',
			'port' => 3306,
			'DBDriver' => 'MySQLi',
			'DBPrefix' => 'cup_',
			'pConnect' => false,
			'cacheOn' => false,
			'cacheDir' => '',
			'charset' => 'utf8',
			'DBCollat' => 'utf8_general_ci',
			'swapPre' => '',
			'encrypt' => false,
			'compress' => false,
			'strictOn' => false,
			'failover' => [],
		),
	);

	public function setCache($time) {
		$this->is_cache = true;
		$this->cache_time = $time;
	}

	public function unsetCache() {
		$this->is_cache = false;
		$this->cache_time = 300;
	}

	public function connect() {
		$conn = new mysqli($this->db[$this->dbGroup]['hostname'], $this->db[$this->dbGroup]['username'], $this->db[$this->dbGroup]['password'], $this->db[$this->dbGroup]['database'], $this->db[$this->dbGroup]['port']);
		$conn->set_charset("utf8");

		$this->dbConnect = $conn;

		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}
	}

	public function addPrefix($queryStr) {

		$replaces = array(
			'/insert\s+into\s+(\w+)/i' => 'insert into ' . $this->db['default']['DBPrefix'] . '$1',
			'/insert\s+into\s+[\`\'](\w+)[\`\']/i' => 'insert into ' . $this->db['default']['DBPrefix'] . '$1',

			'/DROP\s+TABLE\s+IF\s+EXISTS\s+(\w+)/i' => 'DROP TABLE IF EXISTS ' . $this->db['default']['DBPrefix'] . '$1',
			'/DROP\s+TABLE\s+IF\s+EXISTS\s+[\`\'](\w+)[\`\']/i' => 'DROP TABLE IF EXISTS ' . $this->db['default']['DBPrefix'] . '$1',

			'/delete\s+from\s+(\w+)/i' => "delete from " . $this->db['default']['DBPrefix'] . '$1',
			'/delete\s+from\s+[\`\'](\w+)[\`\']/i' => 'delete from ' . $this->db['default']['DBPrefix'] . '$1',

			'/CREATE TABLE\s+(\w+)/i' => "CREATE TABLE " . $this->db['default']['DBPrefix'] . '$1',
			'/CREATE TABLE\s+[\`\'](\w+)[\`\']/i' => "CREATE TABLE " . $this->db['default']['DBPrefix'] . '$1',

			'/SHOW TABLES LIKE\s+[\`\'](\w+)[\`\']/i' => "SHOW TABLES LIKE '" . $this->db['default']['DBPrefix'] . "$1'",

			'/ALTER TABLE\s+(\w+)/i' => "ALTER TABLE " . $this->db['default']['DBPrefix'] . '$1',
			'/ALTER TABLE\s+[\`\'](\w+)[\`\']/i' => "ALTER TABLE " . $this->db['default']['DBPrefix'] . '$1',

			'/select\s+(.*)\s+from\s+(\w+)/iU' => "select $1 from " . $this->db['default']['DBPrefix'] . '$2',

			'/join\s+(\w+)/i' => "join " . $this->db['default']['DBPrefix'] . '$1',
			'/update\s+(\w+)/i' => "update " . $this->db['default']['DBPrefix'] . '$1',

		);

		$queryStr = preg_replace(array_keys($replaces), array_values($replaces), $queryStr);

		return $queryStr;
	}

	public function load_from_cache($queryStr) {
		$hash = md5($queryStr);
		$savePath = PUBLIC_PATH . 'caches/sql/' . $hash . '.php';

		$result = [];

		if (file_exists($savePath)) {
			$mod_time = filemtime($savePath);
			// Seconds
			$liveTime = ((double) time() - (double) $mod_time);

			if ((double) $liveTime > (double) $this->cache_time) {
				unlink($savePath);
			}
		}

		if (!file_exists($savePath)) {
			$this->connect();

			if ($this->dbConnect->connect_error) {
				die("Connection failed: " . $this->dbConnect->connect_error . " - Query: " . $queryStr);
			}

			$queryDB = $this->dbConnect->query($queryStr);

			$this->error = $this->dbConnect->error;

			if (isset($this->error[5])) {
				mysqli_close($this->dbConnect);

				die($this->dbConnect->error . " - Query: " . $queryStr);
			}

			if ((int) $queryDB->num_rows > 0) {
				while ($row = $queryDB->fetch_assoc()) {
					$result[] = $row;
				}
			}

			mysqli_close($this->dbConnect);

			create_file($savePath, "<?php Configs::\$_['sql_result']='" . json_encode($result) . "';");
		}

		require_once $savePath;

		$result = json_decode(Configs::$_['sql_result'], true);

		return $result;

	}

	public function query($queryStr = '', $objectStr = '') {
		$result = [];

		$queryStr = $this->addPrefix($queryStr);

		$this->connect();

		if ($this->dbConnect->connect_error) {
			die("Connection failed: " . $this->dbConnect->connect_error . " - Query: " . $queryStr);
		}

		$queryDB = $this->dbConnect->query($queryStr);

		$this->error = $this->dbConnect->error;

		if (isset($this->error[5])) {
			mysqli_close($this->dbConnect);

			die($this->dbConnect->error . " - Query: " . $queryStr);
		}

		if ((int) $queryDB->num_rows > 0) {
			while ($row = $queryDB->fetch_assoc()) {
				$result[] = $row;
			}
		}

		mysqli_close($this->dbConnect);

		// if($this->is_cache==false)
		// {
		//     $this->connect();

		//     if($this->dbConnect->connect_error)
		//     {
		//         die("Connection failed: " . $this->dbConnect->connect_error." - Query: ".$queryStr);
		//     }

		//     $queryDB = $this->dbConnect->query($queryStr);

		//     $this->error = $this->dbConnect->error;

		//     if(isset($this->error[5]))
		//     {
		//         mysqli_close($this->dbConnect);

		//         die($this->dbConnect->error." - Query: ".$queryStr);
		//     }

		//     if((int)$queryDB->num_rows > 0)
		//     {
		//         while($row=$queryDB->fetch_assoc())
		//         {
		//             $result[]=$row;
		//         }
		//     }

		//     mysqli_close($this->dbConnect);

		// }
		// else
		// {
		//     $result=$this->load_from_cache($queryStr);
		// }

		if (is_object($objectStr)) {
			$objectStr($result);
			return true;
		}

		return $result;

	}

	public function nonquery($queryStr = '', $objectStr = '') {
		$this->connect();

		$queryStr = $this->addPrefix($queryStr);

		$this->dbConnect->multi_query($queryStr);

		$this->error = $this->dbConnect->error;

		if (isset($this->error[5])) {
			mysqli_close($this->dbConnect);

			die($this->dbConnect->error . " - Query: " . $queryStr);
		}

		mysqli_close($this->dbConnect);

		if (is_object($objectStr)) {
			$objectStr();
			return true;
		}

		return true;

	}

}