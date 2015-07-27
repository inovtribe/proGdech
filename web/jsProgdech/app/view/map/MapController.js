/**
 * Controlleur de Map
 */
Ext.define('jsProgdech.view.map.MapController', {
    extend: 'Ext.app.ViewController',

    alias: 'controller.map',

    createMap: function(panel) {
        panel.removeAll();

        var geojson = L.geoJson(gestionnairelayer);
        geojson.setStyle({"color": 'red', "weight": 3, "fill" : false, smoothFactor: 1, "fillOpacity": 0.025});

        var topo = L.tileLayer('http://server.arcgisonline.com/ArcGIS/rest/services/World_Topo_Map/MapServer/tile/{z}/{y}/{x}', {attribution: 'Tiles &copy; Esri &mdash; Esri, DeLorme, NAVTEQ, TomTom, Intermap, iPC, USGS, FAO, NPS, NRCAN, GeoBase, Kadaster NL, Ordnance Survey, Esri Japan, METI, Esri China (Hong Kong), and the GIS User Community'});
        var aerial = L.tileLayer("http://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}", {attribution: "Tiles &copy; Esri &mdash; Source: Esri, i-cubed, USDA, USGS, AEX, GeoEye, Getmapping, Aerogrid, IGN, IGP, UPR-EGP, and the GIS User Community"});
        var baseMaps = {"Carte": topo, "Vue aerienne": aerial};
        var overlayMaps = {};
        var map = L.map('map', {layers: [topo, geojson]});
        L.control.layers(baseMaps, overlayMaps).addTo(map);
        
        geojson = L.geoJson(geometriescommunales, {
            style: style,
            onEachFeature: onEachFeature,}).addTo(map); 

        function style(feature) {
            return { 
                weight: 1,
                opacity: 0.5,
                color: 'green',
                dashArray: '3',
                fillOpacity: 0.0
            };
        }
        function highlightFeature(e, feature, layer) {
            var layer = e.target;
            $("#donneescommune").html(layer.feature.properties.COMMUNE);
            layer.setStyle({
                weight: 2,
                color: 'green',
                dashArray: '',
                fillOpacity: 0.15
            });

            if (!L.Browser.ie && !L.Browser.opera) {
                layer.bringToFront();
            }
        }
        function resetHighlight(e) {
            geojson.resetStyle(e.target);
            $("#donneescommune").html("Survolez une commune");
        }
        function zoomToFeature(e) {
            map.fitBounds(e.target.getBounds());
            var layer = e.target;
            var inseecommune = layer.feature.properties.INSEE;
            document.location.href = "/admin/commune/" + inseecommune;
        }
        function onEachFeature(feature, layer) {
            layer.bindLabel(
                    '<h4>' + layer.feature.properties.COMMUNE + '</h4>'
                );
            layer.on({
                mouseover: highlightFeature,
                mouseout: resetHighlight,
                click: zoomToFeature
            });
        }
        
        map.fitBounds(geojson.getBounds()).setMaxBounds(geojson.getBounds());
    }
});
