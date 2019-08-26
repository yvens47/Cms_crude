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

	 public $link;





	
	function __construct($database, $tablename)
	{

		$this->database = $database;
		$this-> user = "root";
		$this->password='';
		$this->tablename = $tablename;
		$this->link = new mysqli("localhost", $this->user,$this->password, $this->database) ;


		# code...
	}


	function connect(){	 

	return $this->link;
			
	}	


	function query($param){	
		
		$q = $this->link->query($param);		

		return($q);

	}

	function close_db(){
		$this->link->close();
	}
	
}