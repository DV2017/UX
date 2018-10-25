<?php
//getting data from db, json encoding sent to google maps InfoWindow
require("includes/config.php");

$query = mysqli_query($con, "SELECT name, address, lat, lng, imagepath FROM markers ");
while($row = mysqli_fetch_array($query)){
    $data[] = $row;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

<style>
    html { height: 100%; }
    body { height: 100%; margin: 0; padding: 0; }
    #map-canvas { height: 100%; width: 100%; }
</style>

<script async defer 
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDXCrUgHfsEMOiyU16L7TApW9GL-byoP7I&callback=initMap">
</script>

<script>
    //creates Locations array with format [{lat: xxx, lng: yyy}]
    public var data, locations = []; 

    data = <?php echo json_encode($data);?>;
    for(var x = 0; x < data.length; x++) {
        locations.push({
            var lat: data[x][2],
            var lng: data[x][3]
        });
    }
</script>


<script>
    //initialise a map and call the marker function
function initMap() {       
    var myLatLong = new google.maps.LatLng(52.528522, 4.713368);
    var map = new google.maps.Map(document.getElementById("map-canvas"), 
    {
        zoom: 10,
        center: myLatLong,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    });       

    var labels = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    var markers = locations.map(function(location, i) {
        return new google.maps.Marker({
            map: map,
            position: location,
            label: labels[i % labels.length]
        });
    });

    var markerCluster = new MarkerClusterer(map, markers, 
        {imagePath: "google-maps-repo/markerclusterer/m"});

}

</script>

<script 
src="google-maps-repo/markerclusterer/markerclusterer.js">
</script>


</head>
<body onload="initMap()">
    <div id="map-canvas"></div>
</body>
</html>