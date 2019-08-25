<?php session_start();?>

<?php 
require_once ("Core/init.php");
$page->set_title("view");
$id = $_GET['id'];
$comment = new Comment($id, $db);
$c = $comment->view_comments();

?> 
<?php  require_once("Template/header-2.php");?>


<div class='post_wrapper wrapper'>
<div class="jumbotron">
<div class='container'>

	
  <h1 class="display-4"> CMS Crude</h1>
  <p class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi sagittis malesuada dui, vitae posuere ligula mattis vitae.</p>
  <hr class="my-4">
  <p>It usyyyes utility classes for typography and spacing to space content out within the larger container.</p>
  <a class="btn btn-primary-cs btn-lg" href="#" role="button">Learn more</a>

</div>

</div>

<div class='container'>

<div class='row'>
    <div class='col-md-8'>
    <div class='article'>
    <div class='post_category'>
    Technology
    </div>
    <?php   $post = $article->view($id) ?>
    <?php  $post_user_id = $post['user_id'] ?>
    <h1 class='post_title'><?php echo $post['article_title'] ?></h1>
    <img src='http://via.placeholder.com/640x360' class='img-fluid'>
   
        <?php //print_r($article->view($id) );?>
    <p>Posted by <span><?php echo " ". $user->view_user($post_user_id); echo " ". $post['article_date_posted'] ?></span>
    <span class="badge badge-pill badge-success">35 views</span>
				<span class="badge badge-pill badge-info">19 comments</span></p>
    <p><?php echo $post['article_content'] ?></p>
</div>
<div class='comment'>
  <?php   
   
    echo $comment->get_comment_count();
    echo "<pre>";
    print_r($c) ;
    
    
    ?>
   

</div>

</div>


<div class='col-md-4'>

</div>
</div>
</div>
</div>

<?php  require_once("Template/footer.php");?>