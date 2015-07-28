/**
 * Controlleur de Map
 */
Ext.define('jsProgdech.view.map.MapController', {
    extend: 'Ext.app.ViewController',

    alias: 'controller.map',

    /**
     * Retourne le layer d'une commune d'après son n° INSEE.
     *
     * @param panel jsProgdech.view.map.Panel
     * @param insee string N° INSEE de la commune.
     *
     * @return layer Layer de la commune, ou null si elle n'est pas trouvée.
     **/
    getLayerCommuneByInsee: function(panel, insee) {
        var layerReturn = null;

        panel.map.eachLayer(function (layer) {
            if ((typeof(layer.feature) !== 'undefined') && (layer.feature.properties.INSEE == insee)) {
                layerReturn = layer;
                return layer;
            }
        }, this);

        return layerReturn;
    },

    /**
     * Highlight une commune.
     *
     * @param panel jsProgdech.view.map.Panel
     * @param insee string N° INSEE de la commune.
     * @param state boolean true pour highlight, sinon supprime le highligth.
     **/
    doHighlight: function(panel, insee, state) {
        var layerCommune = this.getLayerCommuneByInsee(panel, insee);
        if (layerCommune === null) {
            return;
        }

        if (state === true) {
            layerCommune.setStyle({
                weight: 2,
                color: 'green',
                dashArray: '',
                fillOpacity: 0.15
            });

            if (!L.Browser.ie && !L.Browser.opera) {
                layerCommune.bringToFront();
            }
        }
        else {
            panel.geojson.resetStyle(layerCommune);
        }
    },

    /**
     * Le panel contenant la carte vient d'etre redimenssionné: informe la carte !
     *
     * @param panel jsProgdech.view.map.Panel
     **/
    onResize: function(panel) {
        if (panel.map !== null) {
            panel.map.invalidateSize();
        }
    },

    /**
     * Sélectionne d'une commune:
     *  - Centre la carte sur la commune.
     *  - Affiche les markers liés à la commune.
     *
     * @param panel jsProgdech.view.map.Panel
     * @param insee string N° INSEE de la commune.
     **/
    doSelectCommune: function(panel, insee) {
        // Zoome sur la commune.
        var layerCommune = this.getLayerCommuneByInsee(panel, insee);
        if (layerCommune !== null) {
            panel.map.fitBounds(layerCommune.getBounds());
        }

        // Supprime tous les markers de toutes les communes.
        Ext.getStore('PointsCollecte').each(function(pointCollecte) {
            pointCollecte.deleteMarkers(panel.map);
        });

        // Affiche les markers des points de collecte de la commune spécifiée en paramètre.
        var commune = Ext.getStore('Communes').findRecord('insee', insee);
        if (commune === null) {
            return;
        }
        commune.getPointsCollecte().each(function(pointCollecte) {
            pointCollecte.showMarkerInMap(panel.map);
        }, this);
    },

    /**
     * Créé une map dans le panel spécifié.
     *
     * @param panel jsProgdech.view.map.Panel
     **/
    createMap: function(panel) {
	if (panel.map !== null) {
	    return;
	}

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
            panel.fireEvent('highlightCommune', panel, e.target.feature.properties.INSEE, true);
        }
        function resetHighlight(e) {
            panel.fireEvent('highlightCommune', panel, e.target.feature.properties.INSEE, false);
        }
        function zoomToFeature(e) {
	    panel.fireEvent('selectCommune', panel, e.target.feature.properties.INSEE);
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
	panel.map = map;
	panel.geojson = geojson;
    }
});
