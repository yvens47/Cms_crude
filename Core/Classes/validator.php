<?php
/**
 * 
 */
class Validator
{
	
	function __construct()
	{
		# code...
	}


	function email_validation($email){

		return  filter_var($email, FILTER_VALIDATE_EMAIL);
	}


}