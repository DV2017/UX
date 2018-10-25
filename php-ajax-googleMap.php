<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Load Map point to DB and plot on Map</title>

    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDXCrUgHfsEMOiyU16L7TApW9GL-byoP7I&callback=initMap">
    </script>

    <script src="../js/jquery-3.2.1.js"></script>
    <script>google.load("maps", "2.x");</script>

<style>

</style>

<script>
$(function(){

    $("#add-point").submit(function(){
        geoEncode();
        return false;
    });

    /*
    * Geocoding is the process of converting addresses (like "1600 Amphitheatre 
    * Parkway, Mountain View, CA") into geographic coordinates (like latitude  
    * 37.423021 and longitude -122.083739), which you can use to place markers 
    * or position the map.
    * enable it for the project corresponding to the Google Map API
    * https://developers.google.com/maps/documentation/javascript/geocoding
    */
    var geo = new google.maps.Geocoder();

    var reasons = [];
    reasons[GEO_SUCCESS]
});    
    

</script>

</head>
<body>
    <!-- http://marcgrabanski.com/jquery-google-maps-tutorial-ajax-php-mysql/ -->
 <!-- https://github.com/1Marc/tutorials-jquery-google-maps/blob/master/tutorial-part2.html-->
<!-- https://developers.google.com/maps/documentation/javascript/geocoding -->
   


</body>
</html>