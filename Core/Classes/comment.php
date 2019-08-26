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

        $sql = "select * from comment where comment.post_id ='$this->post_id'";
        $result = $this->db->query($sql);

        $this->set_comment_count($result->num_rows);       
            // loop trhoug and print the comments
            return $result->fetch_all(MYSQLI_ASSOC);
         
    }
    // insert a comment for a post
    function  add_comment($content){

        $sql =" insert into comment (`id`,`user_id`,`post_id`,`text`)
         values(NULL, '$userd_id','$this->post_id', '$content')";

         $result = $this->db->query($sql);

         if($result)
            return "comment is added";

    }
}