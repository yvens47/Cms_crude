<?php

/**
 * 
 */
class Admin extends User
{
	
	function __construct($db)
	{
		# code...
		parent::__construct($db);
	}

	
	/**
	 * is_admin
	 *
	 * @return void
	 */
	function is_admin(){

		if($_SESSION['user_role']  == 1){
			$this->is_admin = true;	
			
		}
		return $this->is_admin;


	}

	function users(){

		$sql  = 'Select * from login';
		$r = $this->db->query($sql);
		while($row = $r->fetch_assoc()){
			$row_data [] = $row;
		}

		return $row_data;



	}

	



}