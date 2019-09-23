<div class="form-group">
  <div class='msg-comment'></div>
<form  class='comment_form'method='post' action='post_comment.php' class='post_comment'>    
<label for="exampleFormControlTextarea1">  
 
     <?php echo $comment->get_comment_count() >0 ? $comment->get_comment_count()." Commnent(s)" : "Be the first to add a comment";?> 
     </label>
    
     <div class='form-group'>
       <?php if(!isset($_SESSION['logged'])):?>
      <input type='text' name='name' placeholder='enter name' class='name form-control col-md-3'/>
      <label class='msg'></label>
      <?php endif ; ?>
     </div>
     <input type='hidden' name='post_id' value='<?php echo $id ?>'>
     <div class='form-group'>
      <input type='url' name='url' class='url form-control col-md-3' value='<?php ?>' placeholder='url'>
      <label class='msg-url'></label>
    </div>
    <textarea name='text' class="f text form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
    <label class='msg-text'></label>
    <div class='btn_wrap'> <button  class='btn btn-info' type='submit' name='post_comment'> Comment</button></div>
</form>
  </div>