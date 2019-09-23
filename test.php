
<?php

$string = "2019-01-24";

//$string = explode('-', $string);

$date  = new DateTime();
$date1  = new DateTime($string);

echo '<pre/>';
print_r($date);


echo '<pre/>';
print_r($date1-$date);