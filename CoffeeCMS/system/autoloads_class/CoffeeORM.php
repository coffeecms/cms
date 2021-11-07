<?php

// Create insert query
// $orm=new CoffeeORM();

// $orm->set_value('system_setting','key_name','123');
// $orm->set_value('user_mst','key_name','456');
// echo $orm->gen_insert_query('user_mst');


// Create update query
// $orm=new CoffeeORM();

// $orm->set_value('user_mst','key_name','456');
// $orm->set_where('user_mst','key_name','123');
// echo $orm->gen_update_query();


class CoffeeORM
{
	private $tablesData=[];

	public function set_value($table_nm,$f_nm='',$f_val='')
	{
		if(!isset($this->tablesData[$table_nm]))
		{
			$this->tablesData[$table_nm]=[];
		}

		if(!isset($f_nm[1]))
		{
			return false;
		}

		$this->tablesData[$table_nm][$f_nm]=$f_val;
	}

	public function set_where($table_nm,$f_nm='',$f_val='')
	{
		if(!isset($this->tablesData[$table_nm]))
		{
			$this->tablesData[$table_nm]=[];
		}		
		if(!isset($this->tablesData[$table_nm]['where']))
		{
			$this->tablesData[$table_nm]['where']=[];
		}

		if(!isset($f_nm[1]))
		{
			return false;
		}

		$this->tablesData[$table_nm]['where'][$f_nm]=$f_val;
	}

	public function gen_insert_query($table_nm='')
	{
		$queryStr='';
		$keyStr='';
		$valStr='';

		$listTables=array_keys($this->tablesData);

		$totalTables=count($listTables);

		for ($i=0; $i < $totalTables; $i++) { 
			if(isset($table_nm[2]) && $table_nm!=$listTables[$i])
			{
				continue;
			}

			$listFields=array_keys($this->tablesData[$listTables[$i]]);

			$totalField=count($listFields);

			$queryStr.="insert into ".$listTables[$i];

			$keyStr='';

			for ($k=0; $k < $totalField; $k++) { 
				$keyStr.=$listFields[$k].',';
				$valStr.="'".$this->tablesData[$listTables[$i]][$listFields[$k]]."',";
			}

			$queryStr.='('.substr($keyStr, 0,strlen($keyStr)-1).') VALUES('.substr($valStr, 0,strlen($valStr)-1).');'."\r\n";
			
		}

		return $queryStr;
	}

	public function gen_update_query($table_nm='')
	{
		$queryStr='';
		$keyStr='';
		$valStr='';

		$listTables=array_keys($this->tablesData);

		$totalTables=count($listTables);

		for ($i=0; $i < $totalTables; $i++) { 
			if(isset($table_nm[2]) && $table_nm!=$listTables[$i])
			{
				continue;
			}

			$listFields=array_keys($this->tablesData[$listTables[$i]]);

			$totalField=count($listFields);

			$queryStr.="update ".$listTables[$i]." set ";

			$keyStr='';

			for ($k=0; $k < $totalField; $k++) { 
				if($listFields[$k]=='where')
				{
					continue;
				}

				$valStr.=$listFields[$k]."='".$this->tablesData[$listTables[$i]][$listFields[$k]]."',";
			}

			if(isset($this->tablesData[$listTables[$i]]['where']))
			{
				$listFields=array_keys($this->tablesData[$listTables[$i]]['where']);

				$totalField=count($listFields);

				for ($k=0; $k < $totalField; $k++) { 
					$keyStr.=$listFields[$k]."='".$this->tablesData[$listTables[$i]]['where'][$listFields[$k]]."' AND ";
				}

			}

			if(isset($keyStr[5]))
			{
				$keyStr=' where '.substr($keyStr, 0,strlen($keyStr)-4);
			}

			$queryStr.=substr($valStr, 0,strlen($valStr)-1).$keyStr.';'."\r\n";
			
		}

		return $queryStr;
	}

}