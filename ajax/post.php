<?php

require '../Core/Classes/article.php';
//require '../Core/Classes/User.php';

require '../Core/Database/database.php';
require '../config/config.php';

//global $db;


$db = new Database(DBHOST,DATABASE, USER, PASSWORD,"login");

//$user = new User($db);
//$validator = new Validator();
//$page = new Page("", "");
//$article = new Article($db);

//$article->display_all(30, 0);
require 'api.php';
ini_set('memory_limit', '1024M'); // o
$post = new PostApi($db);
echo json_encode($post->posts());