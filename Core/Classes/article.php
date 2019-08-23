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

    function author($id){
        $sql = "select user_full_name from login where user_id ='$id'";
        
        $result = $this->db->query($sql);
        return  $result->fetch_assoc()['user_full_name'];

    }


    function display_all() {
        
        $sql = "Select * from articles";
        
        $query = $this->db->query($sql); 
        while($row = mysqli_fetch_assoc($query)){
            $title =substr($row['article_title'],0,30);
            $content = substr($row['article_content'], 0, 150);
            $date = $row['article_date_posted'];
            $id = $row['article_id'];
            
            $author_name = $this->author($row['user_id']);
            
            echo "<div class='post'> <img src='http://via.placeholder.com/640x360' class='pimg img-thumbnail float-left'>". 
            
            "<div class='pwra'><h1 class='ptitle'><a href='view.php?id=$id'>$title</a></h1>".
            "<p class='pdate'>".$author_name. " ".$date."
            <span class='badge badge-pill badge-success'>35 views</span>
            <span class='badge badge-pill badge-info'>19 comments</span> </p>".
            "<p> $content  <a href='view.php?id=$id' class='btn-link'>more...</a></p>".

            "</div></div>";
     
     
        }
        

        
    }

    function view($article_id) {             
        if (is_int((int)$article_id)) {
            $id = filter_var(intval($article_id), FILTER_VALIDATE_INT);            
            // send query to db for article
            $sql = "Select * from articles where article_id ='$id'";      
            $query = $this->db->query($sql);             
            
            if ($query->num_rows == 1) {               
                $row = mysqli_fetch_assoc($query);                
                
                return $row;
                
            }else{
                echo "Article is not found";
            }

        }else{
            header('location: 404.php');
        }
        
       
        
    }

}
