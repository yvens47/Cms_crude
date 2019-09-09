<?php
session_start();
if (!isset($_SESSION['logged'])) {

    header("location:/CMS_Crude/");

    exit();
}
?>


<?php
require_once ("init.php");

$page = new Page("Member area", "Welcome member ");
$title = $page->get_title();

if (isset($_FILES) && !empty($_FILES)) {


    $filename = $_FILES['file']['name'];
    $tmp_name = $_FILES['file']['tmp_name'];
    $dir = dirname(__FILE__);
    (move_uploaded_file($tmp_name, "$dir/Images/$filename"));
    
    
}

?>




<?php require_once("Template/header.php"); ?>
<div class='wrapper'>

<div class='container-fluid'>

    <div class='row'>
        <div class='col-md-3'>
         <?php require_once("Template/member_left_sidebar.php"); ?>
         </div>

         <div class='col-md-9'>

            <div class='main_content'>
            

                
      <div class="tab-content" id="v-pills-tabContent">
      <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
      
          <?php if (isset($_GET['page'])):?>
          
          <div class='filter'>
                <h1>Add a post</h1>
                
              
             </div>

          <div class='toolbar'></div>
          <div class='text-editor'>

          </div>


              

         <?php else: ?>
          
          <!-- filter begins here here --->
             <div class='filter'>
                <h1>filter articles by Month</h1>
                <a href='home.php?page=add' class='btn btn-warning' >Add Article</a>
                <?php require 'Template/filter_form.php'; ?>
              
             </div>
             <!-- filter ends here --->
          <?php print_r($_SESSION) ?>
        	<?php  $article->display_all(50); ?>	


        <?php endif; ?>
      
      
      </div>
      <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">.prof..</div>
      <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">.mes..</div>
      <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">.cont..</div>
    </div>
  </div>


                

               

             
            </div>

                      
                    
           
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