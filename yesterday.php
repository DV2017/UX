<?php
$timezone = date_default_timezone_set("Europe/Amsterdam");


$today = date("Y-n-d");

$yesterday  = date("Y-n-d", mktime(0, 0, 0, date("m")  , date("d")-1, date("Y")));
echo $yesterday;


?>