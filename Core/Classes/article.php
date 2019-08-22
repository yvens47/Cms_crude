<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of article
 *
 * @author jeanypierre
 */
class Article {

    //put your code here
    public $title;
    public $content;
    protected $db;

    function __construct($db) {
        $this->db = $db;
    }

    function display_all() {
        
        $sql = "Select * from articles";
        $query = $this->db->query($sql); 
        while($row = mysqli_fetch_assoc($query)){
            
            print_r($row);
        }
        

        
    }

    function view($article_id) {             
        if (is_int((int)$article_id)) {
            $id = filter_var($article_id, FILTER_VALIDATE_INT);
            // send query to db for article
            $sql = "Select * from articles where article_id ='$id'";      
            $query = $this->db->query($sql);  
            
            
            if ($query->num_rows == 1) {
               
                $row = mysqli_fetch_assoc($query);                    
                
                //$query->close();
                
            }
        }
        
        return $row;
        
    }

}
