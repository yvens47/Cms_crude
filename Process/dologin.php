

<?php

session_start();

//print_r($_POST);

require_once ("../Includes/User.php");
require_once ("../Includes/validator.php");



if ($_SERVER['REQUEST_METHOD'] == 'POST'){

      $email =  htmlspecialchars($_POST['user_email']);
      $password =   htmlspecialchars(md5($_POST['user_password']));


      $validator = new Validator();
      $validator->email_validation($email);
      // check user login
      $user = new User();
      $user->login($email, $password);


      

      //$database = new Database("cms_crude","login");

      //echo "<pre>";

      
   
     //$database->query("SELECT * from login where user_email = '$email' And user_password='$password' ");




      // 

      


}



 ?>