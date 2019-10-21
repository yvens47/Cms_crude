       
 <form  class='' method='post' enctype="multipart/form-data" action='<?php echo $_SERVER['PHP_SELF'] ?>' >
  <div class="form-group row">
  <div class='col-sm-4'>
    <label for="exampleFormControlInput1">Title</label>
    <input name='title'  type="text" class="form-control" id="exampleFormControlInput1" placeholder="enter a title">
  </div>
  </div>
  <div class="form-group row">
  <div class='col-sm-4'>
    <label for="exampleFormControlSelect1">Categorie</label>
    <select name='category' class="form-control" id="exampleFormControlSelect1">
    <?php $category = array("business"=>"Finance", "programming"=>"Programming",   "web"=>"SEO") ?> 
      
      <?php $num =1; foreach($category as $cat) :?>
      <option value='<?php echo $num;  ?>'><?php echo $cat ?></option>
      <?php $num =$num+1; endforeach; ?>
     
    </select>
    </div>
  </div>
  
  <div class="form-group">
  
    <label for="exampleFormControlTextarea1">Content</label>
    <textarea name='content' class="form-control" id="exampleFormControlTextarea1" rows="6">
    </textarea>
  </div>

  <div class="form-group row">
    <div class='col-sm-4'>
    <label for="exampleFormControlTextarea1">Upload</label>
    <input type="file" name="file" class="form-control">
    </div>
    
  </div>


  <div class="form-group">
 
    <input type="submit" value="Post" class='btn btn-primary'>
 
  </div>
</form>