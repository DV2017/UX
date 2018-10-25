<?php 
//not working
require("includes/config.php");
ini_set("display_errors", 1);
error_reporting(E_ALL);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Load location from map to DB</title>
    <script src="assets/js/jquery-3.2.1.js"></script>

<style>
    #map {
        height: 100%;
    }
    html, body {
        height: 100%;
        margin: 0;
        padding: 0;
    }
</style>
</head>
<body>
    <!--https://developers.google.com/maps/documentation/javascript/info-windows-to-db -->

    <div id="map" height="460px" width="100%"></div>
    <form  name="mapForm" id="mapForm" method="GET">
        <table>
            <tr><td>Name:</td><td><input type="text" name="name" id="name" required></td></tr>
            <tr><td>Address:</td><td><input type="text" name="address" id="address" required></td></tr>
            <tr><td>Type:</td>
                <td><select name="type" id="type"> +
                    <option value="Green" SELECTED >Green</option>
                    <option value="Red" >Red</option>
                </select></td>
            </tr>
            <tr><td>Lat:</td><td><input name="lat" type="text" id="lat"></td></tr>
            <tr><td>Lng:</td><td><input name="lng" type="text" id="lng"></td></tr>
            <tr><td></td><td><input name="saveButton" type="submit" value="Save" ></td></tr>   
        </table>
    </form> <!--form-->
    <div id="message"></div>

    <script>
        var map;
        var marker;
        var infowindow;
        var messagewindow;
        var lat;
        var lng;
        var name;
        var address;
        var type;

        function initMap() {
            var california = { lat: 37.4419, lng: -122.1419 };
            map = new google.maps.Map(document.getElementById("map"), { zoom: 15, center: california } );

            infowindow = new google.maps.InfoWindow({ content: document.getElementById("mapForm") });

            messagewindow = new google.maps.InfoWindow({ content: document.getElementById("message") });

            google.maps.event.addListener(map, 'click', function(event) {
                marker = new google.maps.Marker({ position: event.latLng, map: map });

                google.maps.event.addListener(marker, 'click', function() {
                    infowindow.open(map, marker);
                });
                lat = marker.getPosition().lat();
                lng = marker.getPosition().lng();
                document.getElementById("lat").value = lat;
                document.getElementById("lng").value = lng;
                
            });
        
        }

        function saveData() {
        var name = escape(document.getElementById("name").value);
        var address = escape(document.getElementById("address").value);
        var type = document.getElementById("type").value;
        var latlng = marker.getPosition();
        var url = "location-Map-to-DB.php?name=" + name + "&address=" + address +
                    "&type=" + type + "&lat=" + latlng.lat() + "&lng=" + latlng.lng();

        downloadUrl(url, function(data, responseCode) {

            if (responseCode == 200 && data.length <= 1) {
            infowindow.close();
            messagewindow.open(map, marker);
            }
        });
        }
    
/*
        function saveData() {
            var name = escape(document.getElementById("name").value);
            var address = escape(document.getElementById("address").value);
            var type = document.getElementById("type").value;
            var latlng = marker.getPosition();
            var url = "phpsqlinfo_addrow.php?name=" + name + "&address=" + address +
                        "&type=" + type + "&lat=" + latlng.lat() + "&lng=" + latlng.lng();

            downloadUrl(url, function(data, responseCode) {

                if (responseCode == 200 && data.length <= 1) {
                infowindow.close();
                messagewindow.open(map, marker);
                }
            });
        }

        function downloadUrl(url, callback) {
            var request = window.ActiveXObject ?
                new ActiveXObject("Microsoft.XMLHTTP") :
                new XMLHttpRequest;

            request.onreadystatechange = function() {
                if(request.readyState == 4) {
                    request.onreadystatechange = doNothing;
                    callback(request.responseText, request.status);
                }
            };

            request.open('GET', url, true);
                request.send(null);
        }

        function doNothing () {
        }
*/
    </script>

<?php
    if($_SERVER['REQUEST_METHOD'] == 'GET') {

        if(!empty($_GET['name'])) $name = mysqli_escape_string($_GET['name']);
        if(!empty($_GET['address'])) $address = mysqli_escape_string($_GET['address']);
        $lat = mysqli_escape_string($_GET['lat']);
        $lng = mysqli_escape_string($_GET['lng']);
        $type = mysqli_escape_string($_GET['type']);
        
        $request = mysqli_query($con, "INSERT INTO markers VALUES(NULL, '$name', '$address', '$lat', '$lng', '$type')");
    }
?>

<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDXCrUgHfsEMOiyU16L7TApW9GL-byoP7I&callback=initMap">
</script>
</body>
</html>