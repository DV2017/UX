<?php
require("includes/config.php");

$query = mysqli_query($con, "SELECT lat, lng FROM latlngs LIMIT 4");

while($row = mysqli_fetch_array($query)){
    
    $lat[] = $row['lat'];
    $lng[] = $row['lng']; 
}
$ass_array = array($lat, $lng);


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
    locations = <?php echo json_encode($ass_array);?>;
</script>

<script>
    //associative array

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
        var marker, i, x;
        var lat, lng = [];

        for(i=0; i < locations.length; i++) {
            lat = locations[0];
            lng = locations[1];
            var name = locations[i][2];
            var street = locations[i][3];
            
            for(x=0; x<lat.length; x++) {

            
                var latlngset = new google.maps.LatLng(lat[x], lng[x]);

                var marker = new google.maps.Marker( 
                    {
                        map : map,
                        title : name,
                        position : latlngset,
                    }
                );
                
                //map.setCenter(marker.getPosition());
                
                var content = "Latitude: " + lat[x] + ", Longitude: " + lng[x];

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
    }



</script>

</head>
<body onload="initMap()">
    <div id="map-canvas"></div>
</body>
</html>