<?php

class Comment{

    /* @param post id **/

    private $text;
    protected $db;
    private $post_id;
    private  $comment_count; // # of comments


    function __construct($id, $db){

        $this->db = $db;
        $this->post_id= $id;

    }
    
    function set_comment_count($comment){

        $this->get_comment_count = $comment;
    }

    function get_comment_count(){

        return $this->get_comment_count;
    }


    // display all comments based on post id
    function view_comments(){  
        $id = addslashes("".$this->post_id."") ; 
       
         $this->db->safe_string($id); 
        $sql = "select * from comment where comment.post_id ='$id'";
       
        $result = $this->db->query($sql);

        $this->set_comment_count($result->num_rows);       
            // loop trhoug and print the comments
            $datas = array();
            while ($row = $result->fetch_assoc()){
                
                $datas[] = $row;
            }           

        return $datas;
         
    }

    // insert a comment for a post
    function  add_comment($content, $url, $name){  
        // clean user inputs
        $content = $this->db->safe_string($content) ;  
        $name = $this->db->safe_string($name) ;  
        $url = $this->db->safe_string($url) ; 

       $sql ="insert into comment (`id`,`comment_name`,`url`,`post_id`,`text`) values
        (NULL, '$name','$url','$this->post_id', '$content')"; 
           
         $result = $this->db->query($sql);
            
         if($result)
            return $msg['text'] = 'comment is added succesfully';

    }
}