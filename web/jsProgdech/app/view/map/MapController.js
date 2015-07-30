/**
 * Controlleur de Map
 */
Ext.define('jsProgdech.view.map.MapController', {
    extend: 'Ext.app.ViewController',

    alias: 'controller.map',

    /**
     * Mets le zoom par default sur la carte.
     *
     * @param panel jsProgdech.view.map.Panel
     **/
    doZoomInitial: function(panel) {
        panel.map.fitBounds(panel.map.myGeojson.getBounds()).setMaxBounds(panel.map.myGeojson.getBounds());
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

        // Tuiles tophographique.
        var topo = L.tileLayer('http://server.arcgisonline.com/ArcGIS/rest/services/World_Topo_Map/MapServer/tile/{z}/{y}/{x}', {attribution: 'Tiles &copy; Esri &mdash; Esri, DeLorme, NAVTEQ, TomTom, Intermap, iPC, USGS, FAO, NPS, NRCAN, GeoBase, Kadaster NL, Ordnance Survey, Esri Japan, METI, Esri China (Hong Kong), and the GIS User Community'});

        // Tuiles vue aérienne.
        var aerial = L.tileLayer("http://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}", {attribution: "Tiles &copy; Esri &mdash; Source: Esri, i-cubed, USDA, USGS, AEX, GeoEye, Getmapping, Aerogrid, IGN, IGP, UPR-EGP, and the GIS User Community"});

        // Création de la carte, vue topographique par défaut.
        var map = L.map('map', {layers: [topo]});

        // Controles des tuiles.
        var baseMaps = {"Carte": topo, "Vue aerienne": aerial};
        var overlayMaps = {};
        L.control.layers(baseMaps, overlayMaps).addTo(map);

        // Calque: contour.
        var geojson = L.geoJson(gestionnairelayer, {
            style: {
                weight: 3,
                opacity: 0.5,
                color: 'red',
                fill : false,
                smoothFactor: 1
            }
        }).addTo(map);

        // Calques: communes.
        geojson = L.geoJson(geometriescommunales, {
            // Style lorsque commune non sélectionnée.
            style: {
                weight: 0.2,
                opacity: 1,
                color: 'black',
                dashArray: '',
                fillOpacity: 0.0
            }
        }).addTo(map); 

        // Ajout des méthodes pour gérer le zoom.
        map.zoomPrevious = null;

        // Sauvegarde le zoom actuel.
        map.zoomPreviousSave = function(overwrite = false) {
            if ((overwrite === true) || (this.zoomPrevious === null)) {
                this.zoomPrevious = [
                    this.getCenter(),
                    this.getZoom()
                ];
            }
        }

        // Restaure le zoom précédement sauvegardé.
        map.zoomPreviousRestore = function() {
            if (this.zoomPrevious !== null) {
                this.setView(this.zoomPrevious[0], this.zoomPrevious[1]);
                this.zoomPrevious = null;
            }
        }

        /**
         * Retourne le layer d'une commune d'après son n° INSEE.
         *
         * @param insee string N° INSEE de la commune.
         *
         * @return layer Layer de la commune, ou null si elle n'est pas trouvée.
         **/
        map.getLayerCommuneByInsee = function(insee) {
            var layerReturn = null;

            this.eachLayer(function (layer) {
                if ((typeof(layer.feature) !== 'undefined') && (layer.feature.properties.INSEE == insee)) {
                    layerReturn = layer;
                }
            }, this);

            return layerReturn;
        }

        // Mémorise les données pour accès ultérieur.
        map.myGeojson = geojson;
        panel.map = map;

        // Zoom initial.
        panel.fireEvent('zoomInitial', panel);
    }
});
