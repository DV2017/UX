<?php
//php for loading latlng.json
require("includes/config.php");

$latlng = file_get_contents('latlng.json'); //// put the contents in a variable
$data = json_decode($latlng, true); ////decode the json feed to an array

foreach($data as $lat_lng) {
    $lat = $lat_lng['lat'];
    $lng = $lat_lng['lng'];
    $result = "INSERT INTO latlngs VALUES('$lat', '$lng', NULL)";

    $insert = mysqli_query($con, $result);
    if(!$insert) {
        echo "Error";
    }else {
        echo "Latitude: ".$lat." & ". "Longitude: ".$lng."<br>";

    }
}



?>