<div class="form-group">
<form method='post' action='post_comment.php' class='post_comment' enctype='multipart/form-data'>    
<label for="exampleFormControlTextarea1">  
 
     <?php echo $comment->get_comment_count() >0 ? $comment->get_comment_count()." Commnent(s)" : "Be the first to add a comment";?> 
     </label>
     <?php  print_r($_SESSION);?>
     <div class=''>
     <input type='text' name='name' placeholder='name' class='form-control col-md-3'/>
     </div>
     <input type='hidden' name='post_id' value='<?php echo $id ?>'>
    <textarea name='text' class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
    <div class='btn_wrap'> <button class='btn btn-info' type='submit' name='post_comment'> Comment</button></div>
</form>
  </div>