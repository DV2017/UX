<?php
//calendar-events.php
//https://davidwalsh.name/php-calendar
include("includes/config.php");
error_reporting(E_ALL);
ini_set('display_errors', 1);

$query = mysqli_query($con, "SELECT title, date FROM events");
while($row = mysqli_fetch_array($query)):
    $events[$row['date']]=['title'=>$row['title'], 'href'=>'#'];
endwhile;


//print_r($date[0]);
//print_r($date[1]);

//print_r($events);
print_r($events)
?>  