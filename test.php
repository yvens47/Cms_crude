
<?php

$string ='abcdefghijklmnopqrstuvwxyz0123456789';



$newstring ='';

for($i=0; $i < 8; $i++){
     
    $rand = rand(0, strlen($string));

    $newstring .= strval( $string[$rand]);
}

echo $newstring;