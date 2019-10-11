<?php
session_start();
require_once ("init.php");
if (!$user->is_logged_in()) {
    header("location:/CMS_Crude/");
    exit();
}
?>


<?php


$article = new Article($db);

$page = new Page("Member area", "Welcome member ");
$title = $page->get_title();



if ($_SERVER['REQUEST_METHOD'] == 'POST') {

      $title = $_POST['title'];
      $content = $_POST['content'];
      $category = $_POST['category'];



      if (isset($_FILES) && !empty($_FILES)) {
        print_r($_POST);
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

                            

                            
                      </ul>
                    
                    </div>
                                   
                  </div>




         </div>

         <div class='col-md-9'>

            <div class='main_content' id='main'>
           
       
      <div class="tab-content" id="v-pills-tabContent">
      <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
      
          <?php if (isset($_GET['page']) && $_GET['page'] =='add'):?>
          
          <!-- filter for post -->
          <div class='add-post'>
                <h1>Add a post</h1>           
              
          </div>
           <!-- filter for post -->

        
          <div class='row'>
            <div class='col-md-12'>
              <!-- Add form --->
              <?php require_once("Template/add-post-form.php"); ?>
              <!-- Add form --->
            </div>
          </div>

         <?php elseif (isset($_GET['edit'])): ?>
            <h1>Edit post </h1>
            <div class='row'>
            <div class='col-md-12'>
              <!-- Edit form --->
              <?php require_once("Template/edit-post.php"); ?>
              <!-- edit form --->
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
          <table class="table stripped" id='table'>
            <thead>
              <tr>
                  <th scope="col">Title</th>
                  <th scope="col">Author</th>
                  <th scope="col">Category</th>
                  <th scope="col">Comment</th>
                   <th scope="col">Date</th>
                </tr>
              
            </thead>

         
              <tr class='record' v-for='post in postLists[0]'>
              {{post}}
                <td> 
                <div class="title-wrap">
                {{post.article_title}}            
                
                </div> 
                <div class="row-action">
                <span><a  :href="'Admin/preview.php?id='+post.article_id">preview</a></span>
                 <span><a :href="'home.php?edit='+post.article_id">edit</a></span>
                  <span><a  v-bind:data-id= 'post.article_id' class='delete'  :href="'home.php?delete='+post.article_id">delete</a></span>
               
               
                </div>
                
                </td>
                <td>{{post.user_full_name}}</td>
                <td>{{post.name}}</td>
                <td></td>
                <td><p>{{post.article_date_posted}}</p></td>
              </tr>

           


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


