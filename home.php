<?php
session_start();
if (!isset($_SESSION['logged'])) {

    header("location:/CMS_Crude/");

    exit();
}
?>


<?php
require_once ("Core/init.php");

$page = new Page("Member area", "Welcome member ");
$title = $page->get_title();

//print_r($_FILES);

if (isset($_FILES)) {


    $filename = $_FILES['file']['name'];
    $tmp_name = $_FILES['file']['tmp_name'];
    $dir = dirname(__FILE__);
    (move_uploaded_file($tmp_name, "$dir/Images/$filename"));
    
    
}
?>




<?php require_once("Template/header.php"); ?>

<div class="full_screen">
    <div class="sidebar">

        <div class="user_pic_profile">
            <img src="Images/user_profile_pic.png" alt="user picture"/>
            <div class="update_pic">
<!--                <i class="material-icons">
                    camera_enhance
                </i>-->
                <p class="lead"><a href="#" data-toggle='modal' data-target='#mymodal'>update picture</a>
                </p>
            </div>
        </div>
<?php require_once("Template/member_left_sidebar.php"); ?>


    </div>

    <div class="container">
        <div class="row">
            <div class="user_profile_content">
                <div class="title"><h1>Welcome User Profile</h1></div>

                <div class="user_content_area">
<?php if (isset($_GET['page_id']) && $_GET['page_id'] == 'articles'): ?>
                        <div class="filter_article">
                            <div class="col-md-6 float-right"> 
                                <button class="btn btn-secondary">

                                    <!-- For IE9 or below. -->

                                    <i class="material-icons">
                                        view_list
                                    </i>                      </button>

                                <button class="btn btn-secondary">
                                    <!-- For IE9 or below. -->

                                    <i class="material-icons">
                                        view_module
                                    </i> 
                                </button>
    <?php require 'Template/filter_form.php'; ?>

                            </div>
                        </div>

                        All articles posted by user will be display here
                        <div class="card" style="width: 18rem;">
                            <img class="card-img-top" src="http://via.placeholder.com/640x360" alt="Card image cap">
                            <div class="card-body">
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            </div>
                        </div>
<?php endif; ?>




                </div>
            </div>

        </div>
    </div>




</div>

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



<?php require_once("Template/footer.php"); ?>