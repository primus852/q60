function addMarkersToMap(map, isLarge) {

    var icon = new H.map.Icon("assets/img/marker.png");
    var iconCar = new H.map.Icon("assets/img/parking.png");

    var q60Marker = new H.map.Marker({lat:52.501221, lng:13.31339}, {icon: icon});
    var q60Car = new H.map.Marker({lat:52.502104, lng:13.313309}, {icon: iconCar});
    map.addObject(q60Marker);
    if(isLarge){
        map.addObject(q60Car);
    }
    map.setZoom(16);
    map.setBaseLayer(defaultLayers.normal.traffic);
    map.addLayer(defaultLayers.incidents);
    map.setCenter({lat:52.501221, lng:13.31339});
}

var platform = new H.service.Platform({
    app_id: '1Zrmzzrwrp94ZgKziH0U',
    app_code: 'DowR8SW25jqeEpWX7Ba-cw',
    useHTTPS: true
});
var pixelRatio = window.devicePixelRatio || 1;
var defaultLayers = platform.createDefaultLayers({
    tileSize: pixelRatio === 1 ? 256 : 512,
    ppi: pixelRatio === 1 ? undefined : 320
});

var mapLargeExists = document.getElementById('map-large');

var map = new H.Map(document.getElementById('map'),
    defaultLayers.normal.map,{
        center: {lat:50, lng:5},
        zoom: 4,
        pixelRatio: pixelRatio
    });

var behavior = new H.mapevents.Behavior(new H.mapevents.MapEvents(map));
behavior.disable(H.mapevents.Behavior.WHEELZOOM);

if(mapLargeExists !== null){
    var mapLarge = new H.Map(document.getElementById('map-large'),
        defaultLayers.normal.map,{
            center: {lat:50, lng:5},
            zoom: 12,
            pixelRatio: pixelRatio
        });



    var behaviorLarge = new H.mapevents.Behavior(new H.mapevents.MapEvents(mapLarge));
    behaviorLarge.disable(H.mapevents.Behavior.WHEELZOOM);
    var uiLarge = H.ui.UI.createDefault(mapLarge, defaultLayers);
    addMarkersToMap(mapLarge, true);
}
var ui = H.ui.UI.createDefault(map, defaultLayers);
ui.removeControl('mapsettings');


addMarkersToMap(map, false);