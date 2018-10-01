
//https://developers.google.com/maps/documentation/javascript/examples/maptype-image-overlay
//https://developers.google.com/maps/documentation/javascript/examples/maptype-image-overlay
//https://developers.google.com/maps/documentation/javascript/examples/overlay-simple
//https://developers.google.com/maps/documentation/javascript/examples/overlay-simple


// This example creates a custom overlay called USGSOverlay, containing
// a U.S. Geological Survey (USGS) image of the relevant area on the map.

// Set the custom overlay object's prototype to a new instance
// of OverlayView. In effect, this will subclass the overlay class therefore
// it's simpler to load the API synchronously, using
// google.maps.event.addDomListener().
// Note that we set the prototype to an instance, rather than the
// parent class itself, because we do not wish to modify the parent class.

// Este ejemplo crea una superposición personalizada llamada USGSOverlay, que contiene
// una imagen geológica del USGS (USGS) del área relevante en el mapa.
// Establece el prototipo del objeto de superposición personalizada en una nueva instancia
// de OverlayView. En efecto, esto subclase la clase overlay por lo tanto
// es más sencillo cargar el API sincrónicamente, usando
// google.maps.event.addDomListener ().
// Tenga en cuenta que establecemos el prototipo en una instancia, en lugar de
// clase padre en sí, porque no deseamos modificar la clase padre.


var overlay_Temp_n;
var overlay_Lluvia_n;
var overlay_Temp_c;
var overlay_Lluvia_c;
var overlay_Temp_s;
var overlay_Lluvia_s;

var overlay_Humedad_n;
var overlay_Humedad_c;
var overlay_Humedad_s;
USGSOverlay.prototype = new google.maps.OverlayView();


function initMap_clima() {
    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 15,
        center: {lat: 2.463525, lng: -76.585393},
        mapTypeId: 'roadmap'
    });


//Kml
    var ctaLayer = new google.maps.KmlLayer({
        url: 'https://raw.githubusercontent.com/AndresGJ144/mobilitycity/master/Rutacompleta.kml',
        map: map
    });

    var bounds_Humedad_n = new google.maps.LatLngBounds(
        new google.maps.LatLng(2.4761415977325383,  -76.58422887325287),
        new google.maps.LatLng(2.478671, -76.582566));
    var bounds_Temp_n = new google.maps.LatLngBounds(
        new google.maps.LatLng(2.476281, -76.582142),
        new google.maps.LatLng(2.479111, -76.580254));
    var bounds_Lluvia_n = new google.maps.LatLngBounds(
        new google.maps.LatLng(2.47656,  -76.579996),
        new google.maps.LatLng(2.479625, -76.577615));
// The photograph is courtesy of the U.S. Geological Survey.
    var srcImage_Temp_n = 'img/temperatura/'+estadoTemperatura+'.jpeg'; //Lo puedo cambiar a una url de internet..github
    var srcImage_Lluvia_n = 'img/'+string1+'.png';
    var srcImage_Humedad_n = 'img/humedad/'+estadoHumedad+'.png';

    var bounds_Humedad_c = new google.maps.LatLngBounds(
        new google.maps.LatLng(2.460256,  -76.597061),
        new google.maps.LatLng(2.462818, -76.595108));
    var bounds_Temp_c = new google.maps.LatLngBounds(
        new google.maps.LatLng(2.460181,  -76.595575),
        new google.maps.LatLng(2.462732, -76.593922));
    var bounds_Lluvia_c = new google.maps.LatLngBounds(
        new google.maps.LatLng(2.460245,  -76.593858),
        new google.maps.LatLng(2.463118, -76.591583));
// The photograph is courtesy of the U.S. Geological Survey.
    var srcImage_Temp_c = 'img/temperatura/'+estadoTemperatura_zc+'.jpeg'; //Lo puedo cambiar a una url de internet..github
    var srcImage_Lluvia_c = 'img/'+string1_zc+'.png';
    var srcImage_Humedad_c = 'img/humedad/'+estadoHumedad_zc+'.png';

    var bounds_Humedad_s = new google.maps.LatLngBounds(
        new google.maps.LatLng(2.455186,  -76.603369),
        new google.maps.LatLng(2.457684, -76.601234));
    var bounds_Temp_s = new google.maps.LatLngBounds(
        new google.maps.LatLng(2.45525, -76.601197),
        new google.maps.LatLng( 2.457587, -76.599458));
    var bounds_Lluvia_s = new google.maps.LatLngBounds(
        new google.maps.LatLng(2.455551,  -76.599416),
        new google.maps.LatLng(2.458145, -76.597012));
    var srcImage_Temp_s = 'img/temperatura/'+estadoTemperatura_zs+'.jpeg'; //Lo puedo cambiar a una url de internet..github
    var srcImage_Lluvia_s = 'img/'+string1_zs+'.png';
    var srcImage_Humedad_s = 'img/humedad/'+estadoHumedad_zs+'.png';


// The custom USGSOverlay object contains the USGS image,
// the bounds of the image, and a reference to the map.
    overlay_Humedad_n = new USGSOverlay(bounds_Humedad_n, srcImage_Humedad_n, map);
    overlay_Humedad_c = new USGSOverlay(bounds_Humedad_c, srcImage_Humedad_c, map);
    overlay_Humedad_s = new USGSOverlay(bounds_Humedad_s, srcImage_Humedad_s, map);

    overlay_Temp_n = new USGSOverlay(bounds_Temp_n, srcImage_Temp_n, map);
    overlay_Temp_c = new USGSOverlay(bounds_Temp_c, srcImage_Temp_c, map);
    overlay_Temp_s = new USGSOverlay(bounds_Temp_s, srcImage_Temp_s, map);

    overlay_Lluvia_n = new USGSOverlay(bounds_Lluvia_n, srcImage_Lluvia_n, map);
    overlay_Lluvia_c = new USGSOverlay(bounds_Lluvia_c, srcImage_Lluvia_c, map);
    overlay_Lluvia_s = new USGSOverlay(bounds_Lluvia_s, srcImage_Lluvia_s, map);
}

// Inicializa el mapa y la superposición personalizada.

/** @constructor */
function USGSOverlay(bounds, image, map) {

// Initialize all properties.
    this.bounds_ = bounds;
    this.image_ = image;
    this.map_ = map;


// Define una propiedad que contenga la div de la imagen. Bien
// crea realmente este div después de recibir el onAdd ()
// método así que lo dejaremos null por ahora.
    this.div_ = null;

// Explicitly call setMap on this overlay.
// Llama explícitamente a setMap en esta superposición.
    this.setMap(map);
}

/**
 * onAdd is called when the map's panes are ready and the overlay has been
 * added to the map.
 */
USGSOverlay.prototype.onAdd = function() {

    var div = document.createElement('div');
    div.style.borderStyle = 'none';
    div.style.borderWidth = '0px';
    div.style.position = 'absolute';

// Create the img element and attach it to the div.
    var img = document.createElement('img');
    img.src = this.image_;
    img.style.width = '100%';
    img.style.height = '100%';
    img.style.position = 'absolute';
    div.appendChild(img);

    this.div_ = div;

// Add the element to the "overlayLayer" pane.
    var panes = this.getPanes();
    panes.overlayLayer.appendChild(div);
};

USGSOverlay.prototype.draw = function() {

// We use the south-west and north-east
// coordinates of the overlay to peg it to the correct position and size.
// To do this, we need to retrieve the projection from the overlay.
    var overlayProjection = this.getProjection();

// Retrieve the south-west and north-east coordinates of this overlay
// in LatLngs and convert them to pixel coordinates.
// We'll use these coordinates to resize the div.
    var sw = overlayProjection.fromLatLngToDivPixel(this.bounds_.getSouthWest());
    var ne = overlayProjection.fromLatLngToDivPixel(this.bounds_.getNorthEast());

// Resize the image's div to fit the indicated dimensions.
    var div = this.div_;
    div.style.left = sw.x + 'px';
    div.style.top = ne.y + 'px';
    div.style.width = (ne.x - sw.x) + 'px';
    div.style.height = (sw.y - ne.y) + 'px';
};

// The onRemove() method will be called automatically from the API if
// we ever set the overlay's map property to 'null'.
USGSOverlay.prototype.onRemove = function() {
    this.div_.parentNode.removeChild(this.div_);
    this.div_ = null;
};

google.maps.event.addDomListener(window, 'load', initMap_clima);