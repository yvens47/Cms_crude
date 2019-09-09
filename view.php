<?php session_start();?>

<?php 
require_once ("init.php");
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
  
</div>

</div>

<div class='container'>

<div class='row'>
    <div class='col-md-8'>
    <div class='article'>
    <div class='post_category'>
    Technology
    </div>
    <div class='article_wrap'>
    <?php   $post = $article->view($id) ?>
    <?php  $post_user_id = $post['user_id'] ?>
    <h1 class='post_title'><?php echo $post['article_title'] ?></h1>
    <p>Posted by <span><?php echo " ". $user->view_user($post_user_id); echo " ". $post['article_date_posted'] ?></span>
    <span class="badge badge-pill badge-success">35 views</span>
				<span class="badge badge-pill badge-info"><?php echo $comment->get_comment_count()?> comments</span></p>
    <img src='https://cdn.pixabay.com/photo/2017/12/17/07/50/water-3023812_960_720.jpg' class='img-fluid'>
   
        <?php //print_r($article->view($id) );?>
   
    <p><?php echo $post['article_content'] ?></p>
    </div>
</div>
<div class='comment'>

<?php  require 'Template/comment_form.php'; ?>
  
      <?php
    if($comment->get_comment_count() >= 1){
        
        foreach($c as $c_ment => $n){
            echo "<div class='comment_wrap'>".
            "<div class='user_profile_pic'>
            </div>";
            echo   "<p>".$n['text']."</p>";

            echo "</div>";
        }
    }
    
    
    
    ?>
   

</div>

</div>


<div class='col-md-4'>

<div class="article">
    <h1 class="view_title">Request a tutorial</h1>
    <div class='article_wrap'>
    <div class="form-group">
    <label for="exampleFormControlTextarea1">Example textarea</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
  </div></div>

  
    



</div>
<div class='realated'>
<h2>Other Post You might Enjoy</h2>
 <div class='article_wrap'>

 <ul class="">
  <li class="">
    <p>Cras justo odio lipsume content </p>
    <img class='img-fluid' src='https://cdn.pixabay.com/photo/2019/08/24/22/21/child-4428504_960_720.jpg'/>
  </li>


  <li class="">
    <p>Cras justo odio lipsume content </p>
    <img class='img-fluid' src='https://cdn.pixabay.com/photo/2019/08/23/20/06/landscape-4426419_960_720.jpg'/>
    
  </li>


  <li class="">
    <p>Cras justo odio lipsume content </p>
    <img class='img-fluid' src='https://cdn.pixabay.com/photo/2019/03/19/19/54/polyommatus-icarus-4066785_960_720.jpg'/>
  </li>
  
</ul>


 </div>

</div>


</div>
</div>
</div>
</div>

<?php  require_once("Template/footer.php");?>