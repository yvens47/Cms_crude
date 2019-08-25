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


    function view_comments(){

        $sql = "select * from comment where comment.post_id ='$this->post_id'";
        $result = $this->db->query($sql);
        $this->set_comment_count($result->num_rows);


        // have more than one comment
        if($result->num_rows > 1){
            // loop trhoug and print the comments
            return $result->fetch_all(MYSQLI_ASSOC);

        }else if($result->num_rows ==1){

            return $result->fetch_assoc();
        }else{
            // return 0 for now;
            return 0;
            
        }

    
        
    }
}