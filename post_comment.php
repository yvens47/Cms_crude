<?php 
session_start();

require_once ("init.php");

if(isset($_POST['text'])){

    if(isset($_SESSION['logged'])){

        $name = $_SESSION['user_email'];
    }

    else{

        $name = $_POST['name'];
    }

   
    $text =  $_POST['text'];
    $post_id = $_POST['post_id'];
    $url = $_POST['url'];   

    $comment = new Comment($post_id, $db);  

   
   // header('Content-Type: application/json');
    echo json_encode($comment ->add_comment($text, $url, $name));
}





// insert comment to database tabe

// take user most recent posted comment and present it back to the user


?>