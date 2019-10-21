
<?php
session_start();

require_once ("init.php");

// user must logged in to edit his post
if(!$user->is_logged_in()){


    header('location: /CMS_Crude/index.php');

}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
$title = $_POST['title'];
$category = $_POST['category'];
$content = trim($_POST['content']);
$updated = date('Y-m-d');

$id = (int)$_POST['id'];

$article->update( $id, $title, $category, $content, $updated);

}

?>
