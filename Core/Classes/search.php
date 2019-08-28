<?php

class Search {


    private $search_term;
    protected  $db ;

    function __construct($q, $db){
        

        $this->search_term = $q;
        $this->db = $db;
    }

    function search_query(){
        $term = $this->search_term;
        $sql ="SELECT * FROM `articles` WHERE article_title LIKE '%$term%'";
        
        $result = $this->db->connect()->query($sql);
        

        if($result->num_rows > 0){

           while($row = $result->fetch_assoc()){
               
            // loop trough results
             $title = $row['article_title'];
             echo $title ."<br/>";

           } 
        }else{

            // no result


        }
        
    }

}