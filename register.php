<?php
session_start();
if (isset($_SESSION['logged'])) {

    header("location:/CMS_Crude/Dashboard/index.php");
}
require_once ("init.php");
?>

<?php

$error = array();

    if($_SERVER['REQUEST_METHOD']=='POST'){
        
     
        $user_email = $_POST['user_email'];       
        $user_password = $_POST['user_password'];
     
        
        // check  if  all
       
        if(empty($user_email))
            $error['user_email'] = "Email is required";

        if(empty($user_password))
            $error['user_password'] = "Password is required";
       
       
        if(strlen($user_password) < 8  & !empty($user_password))
            $error['password_short'] = "Password must be  8 characters or more";
        
            // error with form proccess registration
        if(count($error) == 0 ){

           $password =md5($user_password) ;
           $user->register($user_email, $password);

        }
        
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