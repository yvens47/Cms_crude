<?php
session_start();
if (!isset($_SESSION['logged'])) {

    header("location:/CMS_Crude/");

    exit();
}
?>


<?php
require_once ("init.php");

$article = new Article($db);

$page = new Page("Member area", "Welcome member ");
$title = $page->get_title();


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

      $title = $_POST['title'];
      $content = $_POST['content'];
      $category = $_POST['category'];



      if (isset($_FILES) && !empty($_FILES)) {


        $filename = $_FILES['file']['name'];
        $tmp_name = $_FILES['file']['tmp_name'];
        $dir = dirname(__FILE__);
        (move_uploaded_file($tmp_name, "$dir/Images/$filename"));

        $article->add($title, $category,$filename,$content);
        
        
    }
}



?>




<?php require_once("Template/header.php"); ?>
<div class='wrapper'>

<div class='container-fluid'>

    <div class='row'>
        <div class='col-md-3'>
         <?php //require_once("Template/member_left_sidebar.php"); ?>

                  <div class="panel mt-5">
                    <div class="panel-heading">Userst</div>
                    <div class="panel-body">
                        <ul class="list-group list-group-flush">
                             <li class="list-group-item"> <a href="?id=1"> <i class="material-icons icons">person_pin</i>All Users</a></li>
                             <li class="list-group-item"> <a href="?id=2"> <i class="material-icons icons">edit</i> Add User</a></li>

                            <li class="list-group-item"> <a href="?id=3"> <i class="material-icons icons">settings_applications</i>Your Profile</a></li>
                            
                             <li class="list-group-item"> <a href="/UxEstate/logout.php"> <i class="material-icons icons">edit</i>Sign out</a></li>

                            
                      </ul>
                    
                    </div>
                                   
                  </div>

                   <div class="panel mt-3">
                    <div class="panel-heading">Post</div>
                    <div class="panel-body">
                        <ul class="list-group list-group-flush">
                             <li class="list-group-item"> <a href="/CMS_Crude/home.php"> <i class="material-icons icons">person_pin</i>Posts</a></li>
                             <li class="list-group-item"> <a href="/CMS_Crude/home.php?page=add"> <i class="material-icons icons">edit</i> Add Post</a></li>

                            <li class="list-group-item"> <a href="?id=3"> <i class="material-icons icons">settings_applications</i>Settings</a></li>
                            
                             <li class="list-group-item"> <a href="/UxEstate/logout.php"> <i class="material-icons icons">edit</i>Sign out</a></li>

                            
                      </ul>
                    
                    </div>
                                   
                  </div>




         </div>

         <div class='col-md-9'>

            <div class='main_content' id='main'>
            {{message}}
       
      <div class="tab-content" id="v-pills-tabContent">
      <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
      
          <?php if (isset($_GET['page'])):?>
          
          <div class='filter'>
                <h1>Add a post</h1>
                
              
             </div>

          <!-- <div class='toolbar'></div>
          <div class='text-editor'></div>
          <div class='post_btn'><button class='btn btn-primary post-it'>Post</button> -->

          <div class='row'>

            <div class='col-md-12'>
 <form  class='' method='post' enctype="multipart/form-data" action='<?php echo $_SERVER['PHP_SELF'] ?>' >
  <div class="form-group row">
  <div class='col-sm-4'>
    <label for="exampleFormControlInput1">Title</label>
    <input name='title' type="text" class="form-control" id="exampleFormControlInput1" placeholder="enter a title">
  </div>
  </div>
  <div class="form-group row">
  <div class='col-sm-4'>
    <label for="exampleFormControlSelect1">Categorie</label>
    <select name='category' class="form-control" id="exampleFormControlSelect1">
    <?php $category = array("business"=>"Finance", "programming"=>"Programming",   "web"=>"SEO") ?> 
      <?php foreach($category as $cat) :?>
      <option><?php echo $cat ?></option>
      <?php endforeach; ?>
     
    </select>
    </div>
  </div>
  
  <div class="form-group">
  
    <label for="exampleFormControlTextarea1">Content</label>
    <textarea name='content' class="form-control" id="exampleFormControlTextarea1" rows="6"></textarea>
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
            </div>



          </div>


              

         <?php else: ?>
          
          <!-- filter begins here here --->
             <div class='filter'>
                <h1>filter articles by Month</h1>
                <a href='home.php?page=add' class='btn btn-warning' >Add Article</a>
                <?php require 'Template/filter_form.php'; ?>
                
              
             </div>
             <!-- filter ends here --->
          <table class="table table-striped">
            <thead>
              <tr>
                  <th scope="col">Title</th>
                  <th scope="col">Author</th>
                  <th scope="col">Category</th>
                  <th scope="col">Comment</th>
                   <th scope="col">Date</th>
                </tr>
              
            </thead>

            <tbody>
              <tr v-for='post in postLists[0]'>
                <td> <strong v-html='post.article_title'></strong></td>
                <td>{{post.user_id}}</td>
                <td>{{post.name}}</td>
                <td></td>
                <td><p>{{post.article_date_posted}}</p></td>
              </tr>

            </tbody>


          </table>
             
          
        	<?php //print_r($article->display_all(10,0)); ?>	


        <?php endif; ?>
      
      
      </div>
      <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">.prof..</div>
      <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">.mes..</div>
      <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">.cont..</div>
    </div>
  </div>


                

               

             
            </div>

                      
                    
           
            <!-- left sidebar -->
          <div class='col-md-2'>hello</div>

          <!-- left sidebar end here -->
         </div>


</div>

<!-- add post modal begins here -->
<div class="modal fade " id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Add a post</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="add_post btn btn-primary">Post it</button>
      </div>
    </div>
  </div>
</div>
<!-- add post modal ends here -->
            



<div class="modal fade bd-example-modal-lg" id='mymodal'tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Upload New Picture</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form name="upload" method="POST" enctype="multipart/form-data" action="home.php">

                    <input type="file" name="file" value="" />

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary upload" data-dismiss="modal">Close</button>
                <input type="submit" class="btn btn-primary" value="Upload">
                </form> 
            </div>
        </div>


    </div>
</div>
</div>

</div>

<?php require_once("Template/footer.php"); ?>
<?php if($_SERVER['REQUEST_URI'] =='/CMS_Crude/home.php') : ?>
          
           <!-- development version, includes helpful console warnings -->
          <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
          <script src='/CMS_Crude/home.js'></script>; 
        
       <?php endif ?>

<!-- Main Quill library -->
<script src="//cdn.quilljs.com/1.3.6/quill.js"></script>
<script src="//cdn.quilljs.com/1.3.6/quill.min.js"></script>

<!-- Theme included stylesheets -->
<link href="//cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
<link href="//cdn.quilljs.com/1.3.6/quill.bubble.css" rel="stylesheet">

<!-- Core build with no theme, formatting, non-essential modules -->
<link href="//cdn.quilljs.com/1.3.6/quill.core.css" rel="stylesheet">
<script src="//cdn.quilljs.com/1.3.6/quill.core.js"></script>
<script src="//cdn.quilljs.com/1.3.6/quill.js"></script>
<script src="//cdn.quilljs.com/1.3.6/quill.min.js"></script>
<script>
var toolbarOptions = [
  ['link','image'],
  ['bold', 'italic', 'underline', 'strike'],        // toggled buttons
  ['blockquote', 'code-block'],

  [{ 'header': 1 }, { 'header': 2 }],               // custom button values
  [{ 'list': 'ordered'}, { 'list': 'bullet' }],
  [{ 'script': 'sub'}, { 'script': 'super' }],      // superscript/subscript
  [{ 'indent': '-1'}, { 'indent': '+1' }],          // outdent/indent
  [{ 'direction': 'rtl' }],                         // text direction

  [{ 'size': ['small', false, 'large', 'huge'] }],  // custom dropdown
  [{ 'header': [1, 2, 3, 4, 5, 6, false] }],

  [{ 'color': [] }, { 'background': [] }],          // dropdown with defaults from theme
  [{ 'font': [] }],
  [{ 'align': [] }],

  ['clean']                                         // remove formatting button
];

var options = {
  debug: 'info',
  modules: {
    toolbar: '.toolbar',
    toolbar: toolbarOptions
  },
  placeholder: 'start writing...',
  readOnly: false,
  theme: 'snow'
};

var editor = new Quill('.text-editor', options); 
</script>
