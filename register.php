<?php
session_start();
if (isset($_SESSION['logged'])) {

    header("location:/CMS_Crude/Dashboard/index.php");
}
?>

<?php

    if($_SERVER['REQUEST_METHOD']=='POST'){
        
        
    }

?>

<?php
require_once ("Core/init.php");

$page->set_title("register");
?> 

<?php require_once("Template/header.php"); ?>

<div class="wrapper-login">

      <div class="register_form center col-md-6">



<?php require_once("Template/register_form.php"); ?>
<?php if (isset($_SESSION['invalid_email'])): echo $_SESSION['invalid_email'];
endif; ?>



    </div>
</div>



<?php require_once("Template/footer.php"); ?>