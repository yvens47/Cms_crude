<?php 
require_once ("init.php");

$error= array();

if(isset($_POST['request'])){
  if(!empty($_POST['request'])){
    $request = $_POST['request'];
    $tutorial = new Tutorial($request,$db);

    $tutorial ->add_request();
    echo "<p> We will redirect back to our home page</p>";

    header( "refresh:3;url=/CMS_Crude/index.php" );
    

  }else{
    array_push($error,"Please enter a request before submit");
  }
}else{
    header('Location: /CMS_Crude/index.php');
}
?>