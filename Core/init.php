<?php

include 'Core/Classes/User.php';
include 'Core/Classes/validator.php';
include 'Core/Database/database.php';
include 'Core/Classes/page.php';
include 'Core/Classes/article.php';
include 'Core/Classes/comment.php';
include 'Core/Classes/pagination.php';
include 'Core/Classes/Tutorial.php';

global $db;


$db = new Database(DBHOST,DATABASE, USER, PASSWORD,"login");

$user = new User($db);
$validator = new Validator();
$page = new Page("", "");
$article = new Article($db);


?>