<?php

class Database
{
    public $dbGroup='default';
    public $dbConnect = '';
    public $error = '';

    public $db=array(
      'default'=>array(
          'DSN'      => '',
          'hostname' => 'localhost',
          'username' => 'root',
          'password' => '',
          'database' => 'coffeecms',
          'port'     => 3306,
          'DBDriver' => 'MySQLi',
          'DBPrefix' => 'cup_',
          'pConnect' => false,
          'cacheOn'  => false,
          'cacheDir' => '',
          'charset'  => 'utf8',
          'DBCollat' => 'utf8_general_ci',
          'swapPre'  => '',
          'encrypt'  => false,
          'compress' => false,
          'strictOn' => false,
          'failover' => [],
      ),   
    );

    public function connect()
    {
        $conn = new mysqli($this->db[$this->dbGroup]['hostname'], $this->db[$this->dbGroup]['username'], $this->db[$this->dbGroup]['password'], $this->db[$this->dbGroup]['database'], $this->db[$this->dbGroup]['port']);
        $conn->set_charset("utf8");
        
        $this->dbConnect = $conn;

        if($conn->connect_error)
        {
            die("Connection failed: " . $conn->connect_error);
        }
    }

    public function addPrefix($queryStr)
    {

      $replaces=array(
        '/insert\s+into\s+([a-zA-Z0-9\_\-]+)/i'=>'insert into '.$this->db['default']['DBPrefix'].'$1',
        '/insert\s+into\s+\`([a-zA-Z0-9\_\-]+)/i'=>'insert into `'.$this->db['default']['DBPrefix'].'$1',
        '/insert\s+into\s+\'([a-zA-Z0-9\_\-]+)/i'=>'insert into \''.$this->db['default']['DBPrefix'].'$1',
        '/from\s+([a-zA-Z0-9\_\-]+)/i'=>'from '.$this->db['default']['DBPrefix'].'$1',
        '/update\s+([a-zA-Z0-9\_\-]+)/i'=>'update '.$this->db['default']['DBPrefix'].'$1',
        '/table\s+([a-zA-Z0-9\_\-]+)/i'=>'table '.$this->db['default']['DBPrefix'].'$1',
        '/table\s+\`([a-zA-Z0-9\_\-]+)/i'=>'table `'.$this->db['default']['DBPrefix'].'$1',
        '/table\s+\'([a-zA-Z0-9\_\-]+)/i'=>'table \''.$this->db['default']['DBPrefix'].'$1',
        '/join\s+([a-zA-Z0-9\_\-]+)/i'=>'join '.$this->db['default']['DBPrefix'].'$1',
      );

      $queryStr=preg_replace(array_keys($replaces), array_values($replaces), $queryStr);

      return $queryStr;
    }

    public function query($queryStr = '',$objectStr='')
    {
        $result=[];

        $this->connect();

        if($this->dbConnect->connect_error)
        {
            die("Connection failed: " . $this->dbConnect->connect_error." - Query: ".$queryStr);
        }        

        $queryStr=$this->addPrefix($queryStr);

        $queryDB = $this->dbConnect->query($queryStr);

        $this->error = $this->dbConnect->error;

        if(isset($this->error[5]))
        {
            mysqli_close($this->dbConnect);
   
            die($this->dbConnect->error." - Query: ".$queryStr);
        }

        if((int)$queryDB->num_rows > 0)
        {
          while($row=$queryDB->fetch_assoc())
          {
              $result[]=$row;
          }
        }

        mysqli_close($this->dbConnect);
        
        if (is_object($objectStr)) {
            $objectStr($result);
            return true;
        }

        return $result;

    }

    public function nonquery($queryStr = '', $objectStr = '')
    {
        $this->connect();

        $queryStr=$this->addPrefix($queryStr);

        $this->dbConnect->multi_query($queryStr);


        $this->error = $this->dbConnect->error;

        if(isset($this->error[5]))
        {
            mysqli_close($this->dbConnect);
   
            die($this->dbConnect->error." - Query: ".$queryStr);
        }

        mysqli_close($this->dbConnect);
   
        if (is_object($objectStr)) {
            $objectStr();
            return true;
        }

        return true;

    }

}