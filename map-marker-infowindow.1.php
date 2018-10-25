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
    var locations = [];
    locations = <?php echo json_encode($data);?>;
</script>

<script>
function initMap() {       
    var myLatLong = new google.maps.LatLng(52.528522, 4.713368);
    var map = new google.maps.Map(document.getElementById("map-canvas"), 
    {
        zoom: 10,
        center: myLatLong,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    });       
    setMarkers(map, locations);   
}

function setMarkers(map, locations){
    var marker, i;
    var lat, lng, name, address, pic;

    for(i=0; i < locations.length; i++) {
        lat = locations[i][2];
        lng = locations[i][3];
        name = locations[i][0];
        address = locations[i][1];
        pic = locations[i][4];
        
        var latlngset = new google.maps.LatLng(lat, lng);
        
        var marker = new google.maps.Marker( 
            {
                map : map,
                title : name,
                position : latlngset,
            }
        );
                            
        var content = " <a href='https://www.google.com' target='blank'><img height='100px'src='"+pic+"'><br><p><strong>"+name+"</strong></a><br>"+address+"</p>";
                
        var infowindow = new google.maps.InfoWindow();

        google.maps.event.addListener(marker, 'click', 
            (function(marker, content, infowindow){
                return function() {
                    infowindow.setContent(content);
                    infowindow.open(map, marker);
                };   
        })(marker, content, infowindow));    
        
    }
}
</script>
</head>
<body onload="initMap()">
    <div id="map-canvas"></div>
</body>
</html>