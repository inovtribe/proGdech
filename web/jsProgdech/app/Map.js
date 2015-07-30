/**
 * Extension de la class L.Map
 **/
var ProGDechMap = L.Map.extend({

    // Le zoom sauvegardé.
    zoomPrevious: null,

    /**
     * Constructeur.
     * Crée la carte avec tous les layers.
     *
     * @param id string ID de l'élément HTML dans lequel la carte va etre créée.
     **/
    initialize: function(id) {
        // Tuiles tophographique.
        var topo = L.tileLayer('http://server.arcgisonline.com/ArcGIS/rest/services/World_Topo_Map/MapServer/tile/{z}/{y}/{x}', {attribution: 'Tiles &copy; Esri &mdash; Esri, DeLorme, NAVTEQ, TomTom, Intermap, iPC, USGS, FAO, NPS, NRCAN, GeoBase, Kadaster NL, Ordnance Survey, Esri Japan, METI, Esri China (Hong Kong), and the GIS User Community'});

        // Tuiles vue aérienne.
        var aerial = L.tileLayer("http://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}", {attribution: "Tiles &copy; Esri &mdash; Source: Esri, i-cubed, USDA, USGS, AEX, GeoEye, Getmapping, Aerogrid, IGN, IGP, UPR-EGP, and the GIS User Community"});

        // Création de la carte, vue topographique par défaut.
        // Appel au constructeur de L.Map
        L.Map.prototype.initialize.call(this, id, { layers: [topo] });

        // Controles des tuiles.
        var baseMaps = {"Carte": topo, "Vue aerienne": aerial};
        var overlayMaps = {};
        L.control.layers(baseMaps, overlayMaps).addTo(this);

        // Calque: contour.
        var geojson = L.geoJson(gestionnairelayer, {
            style: {
                weight: 3,
                opacity: 0.5,
                color: 'red',
                fill : false,
                smoothFactor: 1
            }
        }).addTo(this);

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
        }).addTo(this); 

        // Mémorise les données pour accès ultérieur.
        this.myGeojson = geojson;
    },

    /**
     * Sauvegarde le zoom actuel.
     *
     * @param overwrite boolean
     *   True pour écraser le zoom précédement sauvegardé.
     *   False, si un zoom a été précédement sauvegardé, alors il n'est pas écrasé.
     **/
    zoomPreviousSave: function(overwrite = false) {
        if ((overwrite === true) || (this.zoomPrevious === null)) {
            this.zoomPrevious = [
                this.getCenter(),
                this.getZoom()
            ];
        }
    },

    /**
     * Restaure le zoom précédement sauvegardé.
     **/
    zoomPreviousRestore: function() {
        if (this.zoomPrevious !== null) {
            this.setView(this.zoomPrevious[0], this.zoomPrevious[1]);
            this.zoomPrevious = null;
        }
    },

    /**
     * Retourne le layer d'une commune d'après son n° INSEE.
     *
     * @param insee string N° INSEE de la commune.
     *
     * @return layer Layer de la commune, ou null si elle n'est pas trouvée.
     **/
    getLayerCommuneByInsee: function(insee) {
        var layerReturn = null;

        this.eachLayer(function (layer) {
            if ((typeof(layer.feature) !== 'undefined') && (layer.feature.properties.INSEE == insee)) {
                layerReturn = layer;
            }
        }, this);

        return layerReturn;
    },

    /**
     * Mets le zoom par défaut sur la carte.
     **/
    doZoomInitial: function() {
        this.fitBounds(this.myGeojson.getBounds()).setMaxBounds(this.myGeojson.getBounds());
    }
});
