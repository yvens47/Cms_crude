<?php 

require_once ("Core/init.php");



if(isset($_POST['text'])){

    $text =  $_POST['text'];
    $post_id = $_POST['post_id'];
    //$comment = new Comment($post_id, $db);

    //print_r(json_encode($comment));

   //$result = add_comment($text);
   // header('Content-Type: application/json');
    echo json_encode($_POST);
}





// insert comment to database tabe

// take user most recent posted comment and present it back to the user


?>