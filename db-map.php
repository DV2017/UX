<?php
//JSON here WORKS!
require("includes/config.php");
$sql = "SELECT lat, lng FROM latlngs";

$query = mysqli_prepare($con, $sql);
mysqli_stmt_execute($query);
//get the result
$result = mysqli_stmt_get_result($query);
//fetch row
$rows = mysqli_fetch_row($result);

echo json_encode($rows);

?>
<script>
$(function(){
    $.ajax {
        url: 'db-map.php',
        data: '',
        dataType: 'json',
        success: function(data) {
            var id = data[0];
            var lat = data[1];
            var lng = data[2];
            $('#jason').html(id + lat + lng);
        }
    }
});


</script>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <style>
        #map {
            height: 400px;
            width: 400px;
        }
    </style>
</head>
<body>
    <div id="map"></div>
    <div id="jason"></div>

<script>   

    function initMap() {       
        var castricum = { lat: 52.5453, lng: 4.6727 };
        var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 12,
        center: castricum
        });
        
        var marker = new google.maps.Marker({
            position: castricum,
            map: map,
        });
        }
        /*
        var marker = new google.maps.Marker({
            position: castricum,
            map: map
        });
        */
    }


</script>

    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDXCrUgHfsEMOiyU16L7TApW9GL-byoP7I&callback=initMap">
    </script>
</body>
</html>
