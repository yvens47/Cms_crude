<?php

Class Page
{

	private $title;
	private $description;
	
	function __construct($title, $description){

		
		# code...

		$this->title = $title;

		$this-> description = $description;
	}


	function get_title(){

		return $this->title;
	}
        
        function set_title($title) {
            
            $this->title = $title;
            
        }



	function get_description(){

		return $this->description;
	}




 
}