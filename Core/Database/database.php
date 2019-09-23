<?php

/**
 * 
 */
class Database
{

	 public $database;
	 public $user;
	 public $password;
	 public $tablename;
	 public $connect;
	 private  $host;

	 public $link;





	
	function __construct($host, $database, $user, $password, $tablename)
	{
		$this->host = $host;
		$this->database = $database;
		$this-> user = $user;
		$this->password=$password;
		$this->tablename = $tablename;
		$this->link = new mysqli($this->host, $this->user,$this->password, $this->database) ;


		# code...
	}


	function connect(){	 

	return $this->link;
			
	}	

	// clean user input before enter to db
	function safe($string){

		return $this->connect()->real_escape_string($string);
	}


	function query($param){	
		
		$q = $this->link->query($param);
		
	

		return($q);

	}

	function count_rows(){
		$sql =  "select count(*) from articles";
		$result = $this->query($sql)->fetch_array()[0];
		

		return ($result);
	}

	function close_db(){
		$this->link->close();
	}
	
}