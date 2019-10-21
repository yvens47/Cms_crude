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
            echo "<div class='comment_wrap container'>".
            
            "<div class='row'>
              <div class='col-md-1'>
                 <img style='width:100%'src='https://cdn3.iconfinder.com/data/icons/vector-icons-6/96/256-512.png' class=''/>
              </div> 

              <div class='col-md-11'>
                 <p class='author'>".$n['comment_name']."</p>".
                "<p>".$n['text']."</p>
              </div> ";         
             echo "</div></div>";
        }
    }
    
    
    
    ?>
   

</div>

</div>


<div class='col-md-4'>

<div class="article">
    <h1 class="view_title">Request a tutorial</h1>
    <div class='article_wrap'>
   
    <form method='post' action='request.php'>
    <div class="form-group">
    <label for="exampleFormControlTextarea1">what would you like to learn</label>
    <textarea name='request' class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
     
    <div style='text-align:right; margin-top: 3px'>
      <button type='submit' class='btn  btn-info '>Send</button>
     </form>
  </div>
  </div></div>

  
    



</div>
<div class='realated'>
<h2>Other Post You might Enjoy</h2>
 <div class="article_wrap container">
    <div class="row mb-2">
      <div class="col-md-3 p-0">
        <img style="height:130px; width:100%" src="https://images.unsplash.com/photo-1571605558168-ace5109d29ee?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=500&amp;q=60" class="img-thumbnail">
      </div>
      <div class="col-md-9">
      <p><a href="">Lorem ipsum dolor sit amet, consectetur adipiscing</a> </p>
      
      </div>     
    
    </div>

     <div class="row mb-2">
      <div class="col-md-3 p-0">
              <img style="height:130px; width:100%" src="https://images.unsplash.com/photo-1571637928227-e5ec14ecb8a0?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=500&amp;q=60" class="img-thumbnail">
    </div>
      <div class="col-md-9">
            <p><a href="">Lorem ipsum dolor sit amet, consectetur adipiscing</a> </p>

      </div>     
    
    </div>

     <div class="row">
      <div class="col-md-3 p-0">
      <img style="height:130px; width:100%" src="https://images.unsplash.com/photo-1571624750891-64dfc55a984b?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=500&amp;q=60" class="img-thumbnail">

      </div>
      <div class="col-md-9">
        <p><a href="">Lorem ipsum dolor sit amet, consectetur adipiscing</a> </p>

      
      </div>     
    
    </div>
 </div>

</div>


</div>
</div>
</div>
</div>

<?php  require_once("Template/footer.php");?>