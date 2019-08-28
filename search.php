
<?php

print_r($_GET);

if ($_SERVER['REQUEST_METHOD'] == 'GET'){

    $search_term = htmlspecialchars($_GET['q']);
    require_once ("Core/init.php");
    require 'Core/Classes/search.php' ;
    $search = new Search($search_term, $db);

   print_r($search->search_query());

    
    // clean search term

   

    // todo

}

