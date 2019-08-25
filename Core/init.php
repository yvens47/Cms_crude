<?php

include 'Core/Classes/User.php';
include 'Core/Classes/validator.php';
include 'Core/Database/database.php';
include 'Core/Classes/page.php';
include 'Core/Classes/article.php';
include 'Core/Classes/comment.php';

global $db;


$db = new Database("cms_crude", "login");

$user = new User($db);
$validator = new Validator();
$page = new Page("", "");
$article = new Article($db);


?>