

 <?php 
 
   if(isset($_GET['edit'])){
     $id = intval($_GET['edit']);
     $post  = ($article->edit($id));
   }


 ?>         
 <form  class='' method='post' enctype="multipart/form-data" action='Admin/edit-post.php' >
  <div class="form-group row">
  <div class='col-sm-4'>
   <input type="hidden" name="id" value='<?php echo $id ?>'>
    <label for="exampleFormControlInput1">Title</label>
    <input name='title' value='<?php echo isset($post['article_title']) ? $post['article_title']: "" ; ?>' type="text" class="form-control" id="exampleFormControlInput1" placeholder="enter a title">
  </div>
  </div>
  <div class="form-group row">
  <div class='col-sm-4'>
    <label for="exampleFormControlSelect1">Categorie</label>
    <select name='category' class="form-control" id="exampleFormControlSelect1">
    
      <option value='2'>Finance</option>
       <option value='1'>Technology</option>
        <option value='3'>Programming</option>
    
     
    </select>
    </div>
  </div>
  
  <div class="form-group">
  
    <label for="exampleFormControlTextarea1">Content</label>
    <textarea name='content' class="form-control" id="exampleFormControlTextarea1" rows="6"><?php echo isset($post['article_content']) ? $post['article_content']: "" ; ?>
    </textarea>
  </div>

  <div class="form-group row">
    <div class='col-sm-4'>
    <label for="exampleFormControlTextarea1">Upload</label>
    <input type="file" name="file" class="form-control">
    </div>
    
  </div>


  <div class="form-group"> 

     <input type="submit" value="Edit" class='btn btn-primary'>

  </div>
</form>