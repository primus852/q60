var platform = new H.service.Platform({
    'apikey': 'LONwTgDh2UEdzowV7pfDqawIGWj0NptNaRHL8AWPswg'
});

var pixelRatio = window.devicePixelRatio || 1;
var defaultLayers = platform.createDefaultLayers();

var mapLargeExists = document.getElementById('map-large');

var map = new H.Map(
    document.getElementById('map'),
    defaultLayers.vector.normal.map,
    {
        zoom: 14,
        center: { lat: 52.501221, lng: 13.313309 }
    });

var behavior = new H.mapevents.Behavior(new H.mapevents.MapEvents(map));
behavior.disable(H.mapevents.Behavior.WHEELZOOM);

if(mapLargeExists !== null){
    var mapLarge = new H.Map(
        document.getElementById('map-large'),
        defaultLayers.vector.normal.map,
        {
            zoom: 14,
            center: { lat: 52.501221, lng: 13.313309 }
        });



    var behaviorLarge = new H.mapevents.Behavior(new H.mapevents.MapEvents(mapLarge));
    behaviorLarge.disable(H.mapevents.Behavior.WHEELZOOM);
    var uiLarge = H.ui.UI.createDefault(mapLarge, defaultLayers);
    addMarkersToMap(mapLarge, true, defaultLayers);
}
var ui = H.ui.UI.createDefault(map, defaultLayers, 'de-DE');
ui.removeControl('mapsettings');


addMarkersToMap(map, false, defaultLayers);

function addMarkersToMap(map, isLarge, defaultLayers) {

    var icon = new H.map.Icon("assets/img/marker.png");
    var iconCar = new H.map.Icon("assets/img/parking.png");

    var q60Marker = new H.map.Marker({lat:52.501221, lng:13.31339}, {icon: icon});
    var q60Car = new H.map.Marker({lat:52.502104, lng:13.313309}, {icon: iconCar});
    map.addObject(q60Marker);
    if(isLarge){
        map.addObject(q60Car);
    }
    map.setZoom(16);
    map.setBaseLayer(defaultLayers.vector.normal.traffic);
    map.addLayer(defaultLayers.vector.normal.trafficincidents);
    map.setCenter({lat:52.501221, lng:13.31339});
}