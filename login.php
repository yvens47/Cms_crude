<?php
session_start();


if (isset($_SESSION['logged'])) {
    header("Location: home.php");
}
?>

<?php
require_once ("Core/init.php");
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $email = htmlspecialchars($_POST['user_email']);
    $password = htmlspecialchars(md5($_POST['user_password']));


    if (!empty($email) && !empty($password)) {

        if ($validator->email_validation($email) == FALSE) {

            $error = " Invalid email";
        } else {

            // login User
            if ($user->login($email, $password) == FALSE) {

                $error = "inccorect email and passowrd";
                
            } else {
                // login succes , redirect to member area
                header("Location: home.php");
            }
        }
    } else {
        $error = " PLease enter email and password";
    }
}
?>

<?php
$page = new Page("sign in", "please sign in ");
$title = $page->get_title();
?> 


<?php require_once("Template/header.php"); ?>

<div class="wrapper-login">

    <!--- login form -->
<?php require_once("Template/login_form.php"); ?>
    <!-- form ends here --->

</div>


<?php require_once("Template/footer.php"); ?>