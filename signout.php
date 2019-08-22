<?php
session_start();
if($_SESSION['logged'] ){

	session_destroy();
    header("location:/CMS_Crude/");


}