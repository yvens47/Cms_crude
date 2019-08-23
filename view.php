<?php session_start();?>

<?php 
require_once ("Core/init.php");
$page->set_title("view");

?> 
<?php  require_once("Template/header-2.php");?>

<div class='post_wrapper wrapper'>
<div class='container'>

<div class='row'>
    <div class='col-md-8'>
    
    <?php  $id = $_GET['id']; $post = $article->view($id) ?>
    <?php  $post_user_id = $post['user_id'] ?>
    <h1 class='post_title'><?php echo $post['article_title'] ?></h1>
    <img src='http://via.placeholder.com/640x360' class='img-fluid'>
   
        <?php //print_r($article->view($id) );?>
    <p>Posted by <span><?php echo " ". $user->view_user($post_user_id); echo " ". $post['article_date_posted'] ?></span>
    <span class="badge badge-pill badge-success">35 views</span>
				<span class="badge badge-pill badge-info">19 comments</span></p>
    <p><?php echo $post['article_content'] ?></p>
</div>

<div class='col-md-4'>

</div>
</div>
</div>
</div>

<?php  require_once("Template/footer.php");?>