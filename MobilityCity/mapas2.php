
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="initial-scale=1.0">
    <meta charset="utf-8">
    <title>KML Layers</title>

    <style>
        /* Always set the map height explicitly to define the size of the div
         * element that contains the map. */
        #map {
            height: 100%;
        }
        /* Optional: Makes the sample page fill the window. */
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
        }
    </style>
</head>
<body onload="initMap_clima();">
<div id="map"></div>
<script type='text/javascript'>

    function initMap_clima() {

        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 11,
            center: {lat: 2.466441, lng: -76.585801}
        });

        var ctaLayer = new google.maps.KmlLayer({
            url: 'https://raw.githubusercontent.com/AndresGJ144/mobilitycity/master/Rutacompleta.kml',
            map: map
        });
    }
</script>
<script  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBp8tOsgWyAmX1ZnO-CPhpnqwuaZgx0uzc&callback=initMap_clima"></script>
</body>
</html>
