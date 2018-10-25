<?php
include("includes/config.php");
include("class/Calendar.php");

ini_set("display_errors", 1);
error_reporting(E_ALL);


if(isset($_POST['month']) && isset($_POST['year'])){
    $month = $_POST['month'];
    $year = $_POST['year'];
}

$query = mysqli_query($con, "SELECT title, date FROM events");
while($arr = mysqli_fetch_assoc($query)){
    $events[$arr['date']]=['title'=>$arr['title'], 'href'=>'https://www.google.com'];
}

$calendar = new Calendar();
$calendar->build_html_calendar($year, $month, $events);

?>