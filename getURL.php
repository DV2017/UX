<?php

$actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

$myurl = $_SERVER['REQUEST_URI'];

echo $actual_link. "<br>";
echo $myurl;
?>