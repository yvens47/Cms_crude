<?php
session_start();
if (!isset($_SESSION['logged'])) {

    header("location:/CMS_Crude/");

    exit();
}
?>


<?php require_once ("Core/init.php");

$article_id ='';
if(isset($_GET['article_id']))
    $article_id = $_GET['article_id'];

    

$article = $article->view($article_id);
$page = new Page("".$article['article_title'], "Welcome member ");
$title = $page->get_title();
?>




<?php require_once("Template/header.php"); ?>
<div class="wrapper">
    <div class="content container">
        <div class="row">
            <div class="col-md-8">                
                 <h1><?php  echo $article['article_title'] ?></h1>
            </div>
        </div>
    </div>
   
</div>




<?php require_once("Template/footer.php"); ?>