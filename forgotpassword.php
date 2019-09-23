<?php 
//require ABSPATH ."/config/config.php";

require_once ("init.php"); ?>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
  
    if (!empty($_POST['user_email'])) {

        $email = $_POST['user_email'];
        // validate email;

        if ($validator->email_validation($email) == FALSE) {

            $error = " Invalid email";
        }
        else{
            // proccess email verification
            $user->forgot_password($email);
        }
    } else {
        $error = " Please enter email address previously used";
    }
}
?>



<?php require_once("Template/header.php"); ?>


<div class="wrapper-login">
    <?php require_once 'Template/forgot_password_form.php'; ?>
</div>


<?php require_once("Template/footer.php"); ?>