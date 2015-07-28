/**
 * Controlleur de Map
 */
Ext.define('jsProgdech.view.map.MapController', {
    extend: 'Ext.app.ViewController',

    alias: 'controller.map',

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
     *  - Ne sélectionne que cette commune.
     *  - Centre la carte sur la commune.
     *
     * @param panel jsProgdech.view.map.Panel
     * @param insee string N° INSEE de la commune.
     **/
    doSelectCommune: function(panel, insee) {
        var storeCommunes = Ext.getStore('Communes');
        var commune = storeCommunes.findRecord('insee', insee);

        // Sélectionne la commune.
        // Déselectionne toutes les autres communes.
        storeCommunes.each(function(record) {
            record.set('select', record.get('insee') == insee);
        });

        // Zoome sur la commune.
        panel.map.fitBounds(commune.layer.getBounds());
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
            onEachFeature: onEachFeature
        }).addTo(map); 

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
            var commune = Ext.getStore('Communes').findRecord('insee', e.target.feature.properties.INSEE);
            commune.doHighlight(true);
        }
        function resetHighlight(e) {
            var commune = Ext.getStore('Communes').findRecord('insee', e.target.feature.properties.INSEE);
            commune.doHighlight(false);
        }
        function selectCommune(e) {
            var commune = Ext.getStore('Communes').findRecord('insee', e.target.feature.properties.INSEE);
            commune.set('select', ! commune.get('select'));
        }
        function selectOneCommune(e) {
            panel.fireEvent('selectOneCommune', panel, e.target.feature.properties.INSEE);
        }
        function onEachFeature(feature, layer) {
            layer.bindLabel(
                '<h4>' + layer.feature.properties.COMMUNE + '</h4>'
            );
            layer.on({
                mouseover: highlightFeature,
                mouseout: resetHighlight,
                click: selectCommune,
                dblclick: selectOneCommune
            });
        }

        map.fitBounds(geojson.getBounds()).setMaxBounds(geojson.getBounds());
        map.myGeojson = geojson;
        panel.map = map;

        // Écoute les modifications sur le store des communes.
        var storeCommunes = Ext.getStore('Communes');
        storeCommunes.on('load', this.onStoreCommunesLoad);
        storeCommunes.on('update', this.onStoreCommunesUpdate);

        // Écoute les modifications sur le stores des Points de collecte.
        var storePointsCollecte = Ext.getStore('PointsCollecte');
        storePointsCollecte.on('load', this.onStorePointsCollecteLoad);
    },

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
     * Le store des communes vient d'etre lu.
     * Renseigne les communes sur la map et son layer.
     * Highlighte correctement les communes.
     **/
    onStoreCommunesLoad: function(storeCommunes, records) {
        var mapPanel = Ext.getCmp('map');

        storeCommunes.each(function(record) {
            var layerCommune = mapPanel.getController().getLayerCommuneByInsee(mapPanel, record.get('insee'));
            record.map = mapPanel.map;
            record.layer = layerCommune;
            layerCommune.commune = record;

            record.doHighlight(false);
        }, this);
    },

    /**
     * Le record d'une commune vient d'etre modifié.
     * Ajuste la map si c'est le champs select qui a été modifié.
     **/
    onStoreCommunesUpdate: function(store, record, operation, modifiedFieldNames, details) {
        record.doHighlight(false);
    },

    /**
     * Le store des points de collecte vient d'etre lu.
     * Renseigne les points de collecte sur le map.
     * Affiche correctement les markers.
     **/
    onStorePointsCollecteLoad: function(storePointsCollecte, records) {
        var mapPanel = Ext.getCmp('map');

        storePointsCollecte.each(function(record) {
            record.map = mapPanel.map;
            record.displayMarker();
        }, this);
    }
});
