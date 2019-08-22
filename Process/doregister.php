<?php
session_start();


require_once ("../Includes/User.php");
require_once ("../Includes/validator.php");
if ($_SERVER['REQUEST_METHOD'] == 'POST'){

      $email =  htmlspecialchars($_POST['user_email']);

      $password =   htmlspecialchars(md5($_POST['user_password']));

      $validate = new Validator();

      //validate email

      if($validate->email_validation($email)){     

      	unset($_SESSION['invalid_email'] );

      	// register new user

      	$user = new User();
      	
      	$user->register($email, $password);


      }else{

      	$_SESSION['invalid_email'] = "your email is invalid";

      	header("Location:/CMS_Crude/register.php");
      	print_r($_SESSION);

      }


  }
  else{

  	
  }