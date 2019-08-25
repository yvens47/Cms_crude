<?php

class Comment{

    /* @param post id **/

    private $text;
    protected $db;
    private $post_id;


    function __construct($id, $db){

        $this->db = $db;
        $this->post_id= $id;

    }

    function view_comments(){

        $sql = "select * from comment where comment.post_id ='$this->post_id'";
        $result = $this->db->query($sql);

        // have more than one comment
        if($result->num_rows > 1){
            // loop trhoug and print the comments
            return $result->fetch_assoc(MYSQLI_ASSOC);

        }else if($result->num_rows ==1){

            return $result->fetch_assoc(MYSQLI_ASSOC);
        }else{
            // return 0 for now;
            return 0;
            
        }

    
        
    }
}