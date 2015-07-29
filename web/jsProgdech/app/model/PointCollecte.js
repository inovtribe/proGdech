Ext.define('jsProgdech.model.PointCollecte', {
    extend: 'Ext.data.Model',
    fields: [
        {name: 'id',  type: 'int'},
        {name: 'nom',  type: 'string'},
        {name: 'latitude',  type: 'number'},
        {name: 'longitude', type: 'number'},
        {name: 'volontaire', type: 'boolean'},
        {name: 'commune_id', type: 'int'},
        {name: 'select', type: 'boolean', defaultValue: false}   // Extjs uniquement : sélectionnée ou pas.
    ],

    map: null,      // La carte où est affiché le point de collecte.
    marker: null,   // Le marker n'est pas encore créé.
    commune: null,  // La commune liée.

    proxy: {
        type: 'ajax',
        url: 'pointscollecte.json',
        reader: {
            type: 'json',
            rootProperty: 'pointsCollecte'
        }
    },


    /**
     * Créé le marker dans la carte.
     **/
    createMarker: function() {
        if ((this.map === null) || (this.marker !== null)) {
            return;
        }

        var marker = this.get('volontaire') == true ?
            L.icon({
            iconUrl: '/bundles/geographprogdech/images/markers/pointcollecte_volontaire.png',
            iconSize:     [32, 32],
            iconAnchor:   [16, 32],
            popupAnchor:  [0, -32]
        }) :
            L.icon({
            iconUrl: '/bundles/geographprogdech/images/markers/pointcollecte_defaut.png',
            iconSize:     [20, 32],
            iconAnchor:   [10, 32],
            popupAnchor:  [0, -32]
        });

        marker = L.marker([this.get('latitude'), this.get('longitude')], {icon: marker}).addTo(this.map);
        marker.bindLabel(
            '<h4>' + this.get('nom') + '</h4>'
            + '<p>X Bacs de type ?</p>'
            + '<p>X Bacs de type ?</p>'
        );

        marker.pointCollecte = this;

        // Clic sur le point de collecte.
        marker.on('click', function() {
            // Désélectionne le point de collecte précédement sélectionné. 
            var markerSelected = Ext.getStore('PointsCollecte').findRecord('select', true);
            if (markerSelected !== null) {
                if (markerSelected.pointCollecte.get('id') === marker.pointCollecte.get('id')) {
                    return; // Le marker sélectionné est le meme.
                }
                markerSelected.pointCollecte.set('select', false);
            }

            // Sélectionne le marker.
            marker.pointCollecte.set('select', true);
        });

        this.marker = marker;
    },

    /**
     * Retourne la commune liée au Point de collecte.
     *
     * @return jsProgdech.model.Commune (ou null si la commune n'existe pas, ou pas encore chargée)
     **/
    getCommune: function() {
        if (this.commune  === null) {
            this.commune = Ext.getStore('Communes').getById(this.get('commune_id'));
        }
        return this.commune;
    },

    /**
     * Affiche le marker du point de collecte.
     * Conformément à l'état de la commune liée.
     **/
    displayMarker: function() {
        var commune = this.getCommune();
        if ((commune === null) || (this.map === null)) {
            return;
        }

        if (commune.get('select') !== true) {
            // Supprime le marker.
            if (this.marker !== null) {
                this.map.removeLayer(this.marker);
                this.marker = null;

            }
        }
        else {
            // Affiche/créé le marker.
            this.createMarker();
        }
    }
});
