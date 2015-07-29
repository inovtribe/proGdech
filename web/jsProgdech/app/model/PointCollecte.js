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
        if (this.map === null) {
            return;
        }

        if (this.marker !== null) {
            this.map.removeLayer(this.marker);
        }

        // Icone du marker.
        var icon = this.get('volontaire') == true ?  {
            iconUrl: '/bundles/geographprogdech/images/markers/pointcollecte_volontaire.png',
            iconSize:     [32, 32],
            iconAnchor:   [16, 32],
            popupAnchor:  [0, -32]
        } : {
            iconUrl: '/bundles/geographprogdech/images/markers/pointcollecte_defaut.png',
            iconSize:     [20, 32],
            iconAnchor:   [10, 32],
            popupAnchor:  [0, -32]
        };

        // Double la taille d'icone d'un Point de collecte sélectionné.
        if (this.get('select') === true) {
            icon.iconSize[0] = icon.iconSize[0] * 2;
            icon.iconSize[1] = icon.iconSize[1] * 2;
            icon.iconAnchor[0] = icon.iconSize[0] / 2;
            icon.iconAnchor[1] = icon.iconSize[1];
        }

        // Création de l'icone.
        icon = L.icon(icon);

        var marker = L.marker([this.get('latitude'), this.get('longitude')], {icon: icon}).addTo(this.map);

        // Popup du maker.
        marker.bindLabel(
            '<h4>' + this.get('nom') + '</h4>'
            + '<p>X Bacs de type ?</p>'
            + '<p>X Bacs de type ?</p>'
        );

        marker.pointCollecte = this;

        // Évènement: clic sur le marker.
        marker.on('click', function() {
            // Désélectionne le point de collecte précédement sélectionné. 
            var pointCollecteSelected = Ext.getStore('PointsCollecte').findRecord('select', true);
            if (pointCollecteSelected !== null) {
                // Déselectionne le point de collecte précédement sélectionné.
                pointCollecteSelected.set('select', false);

                if (pointCollecteSelected.get('id') === marker.pointCollecte.get('id')) {
                    // On a cliqué sur le marker déjà sélectionné.
                    return; 
                }
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
