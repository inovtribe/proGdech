Ext.define('jsProgdech.model.PointCollecte', {
    extend: 'Ext.data.Model',
    fields: [
        {name: 'id',  type: 'int'},
        {name: 'nom',  type: 'string'},
        {name: 'reference',  type: 'string'},
        {name: 'adresse',  type: 'string'},
        {name: 'latitude',  type: 'number'},
        {name: 'longitude', type: 'number'},
        {name: 'date_creation', type: 'date', dateFormat: 'Y-m-d'},
        {name: 'createur', type: 'string'},
        {name: 'emplacement', type: 'number'},
        {name: 'volontaire', type: 'boolean'},
        {name: 'commune_id', type: 'int'},
        {name: 'select', type: 'boolean', defaultValue: false}   // Extjs uniquement : sélectionnée ou pas.
    ],

    marker: null,   // Le marker n'est pas encore créé.
    commune: null,  // La commune liée.

    proxy: {
        type: 'ajax',
        api: {
            create  : '/admin/pointCollecteCreate',
            read    : '/admin/pointscollecte.json',
            update  : '/admin/pointCollecteUpdate',
            //destroy : ''
        },
        reader: {
            type: 'json',
            rootProperty: 'pointsCollecte'
        },
        writer: {
            type: 'json'
        }
    },

    /**
     * Créé le marker dans la carte.
     *
     * @param draggable boolean True pour que le marker soit déplacable, false sinon.
     **/
    createMarker: function(draggable) {
        // Icone du marker.
        var icon = this.get('volontaire') == true ?  {
            iconUrl: '/bundles/geographprogdech/images/markers/pointcollecte_volontaire.png',
            iconSize:     [32, 32],
            popupAnchor:  [0, -32]
        } : {
            iconUrl: '/bundles/geographprogdech/images/markers/pointcollecte_defaut.png',
            iconSize:     [20, 32],
            popupAnchor:  [0, -32]
        };

        // Double la taille d'icone d'un Point de collecte sélectionné.
        if (this.get('select') === true) {
            icon.iconSize[0] = icon.iconSize[0] * 2;
            icon.iconSize[1] = icon.iconSize[1] * 2;
        }

        // Position de l'icone par rapport au point (ancrée au topleft de l'image)
        icon.iconAnchor = [
            icon.iconSize[0] / 2,   // Centre horizontalement.
            icon.iconSize[1]        // Bas de l'icone.
        ];

        // Création de l'icone.
        icon = L.icon(icon);

        if (this.marker !== null ) {
            // Le marker existe déjà: on modifie uniquement son icone.
            this.marker.setIcon(icon);
            return;
        }

        // Création du marker
        this.marker = L.marker([
            this.get('latitude'), this.get('longitude')
        ], {
            icon: icon,
            draggable: draggable
        }).addTo(Ext.map);

        // Popup du maker.
        this.marker.bindLabel(
            '<h4>' + this.get('nom') + '</h4>'
            + '<p>X Bacs de type ?</p>'
            + '<p>X Bacs de type ?</p>'
        );

        // Évènements du marker.
        this.marker.on('click', this.onMarkerClick, this);
        this.marker.on('dragend', this.onMarkerDragEnd, this);
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
     * Affiche ou supprime le marker du point de collecte.
     * Conformément à l'état de la commune liée.
     **/
    displayMarker: function() {
        var commune = this.getCommune();
        if ((commune === null) || (Ext.map === null)) {
            return;
        }

        if (commune.get('select') === true) {
            // La commune est sélectionné: on affiche/créé le marker.
            this.createMarker(false);
        }
        else {
            // La commune n'est pas sélectionné: on supprime le marker.
            if (this.marker !== null) {
                Ext.map.removeLayer(this.marker);
                this.marker = null;
            }
        }
    },

    /**
     * Clic sur le marker du point de collecte.
     **/
    onMarkerClick: function() {
        if (this.marker.dragging.enabled() === true) {
            // On ne peut pas cliquer sur un marker en train d'etre déplacé.
            return;
        }

        // Inverse la sélection du point de collecte.
        this.set('select', ! this.get('select'));
    },

    /**
     * Le marker du point de collecte vient d'etre déplacé.
     **/
    onMarkerDragEnd: function() {
        // Vérifie qu'un point de collecte n'existe pas à proximité.
        var pointsCollecte = Ext.getStore('PointsCollecte').getPointsCollecteInsideRange(this.marker.getLatLng(), 10);
        if (pointsCollecte.length > 0) {
            if ((pointsCollecte.length > 1) || (pointsCollecte.getAt(0).get('id') !== this.get('id'))) {
                // Annule le déplacement du marker.
                this.marker.setLatLng([this.get('latitude'), this.get('longitude')]);
                return;
            }
        }

        // Récupère les coordonnées du marker dans le point de collecte.
        this.set({
            longitude: this.marker.getLatLng().lng,
            latitude: this.marker.getLatLng().lat
        });

        // Centre la carte sur le marker.
        Ext.map.setView([
            this.get('latitude'),
            this.get('longitude')
        ]);
    },

    /**
     * Active ou non le déplacement du marker.
     *
     * @param state boolean True pour autoriser le déplacement du marker, false sinon.
     **/
    setDraggable: function(state) {
        if (this.marker !== null) {
            if (this.marker.dragging.enabled() === state) {
                // Le marker est déjà dans l'état demandé: on ne fait rien.
                return;
            }

            // Suppression du marker.
            Ext.map.removeLayer(this.marker);
            this.marker = null;
        }

        // Création du marker.
        this.createMarker(state);
    }
});
