Ext.define('jsProgdech.store.Communes', {
    extend: 'Ext.data.Store',
    alias: 'store.communes',
    model: 'jsProgdech.model.Commune',
    autoLoad: true,

    sorters: [{
        property: 'nom',
        direction: 'ASC'
    }],

    listeners: {
        'add': 'addRecords',
        'load': 'addRecords',
        'update': 'onUpdateCommune'
    },

    /**
     * Le record d'une commune vient d'etre modifié.
     * Ajuste la map si c'est le champs select qui a été modifié.
     *
     * Déselectionne le point de collecte sélectionné.
     **/
    onUpdateCommune: function(store, record) {
        // Déselectionne le point de collecte sélectionné.
        var pointCollecteSelected = Ext.getStore('PointsCollecte').findRecord('select', true);
        if (pointCollecteSelected !== null) {
            pointCollecteSelected.set('select', false);
        }

        // Affiche correctement le layer de la commune.
        record.doHighlight(false);

        // Restaure le zoom (s'il y en avait un).
        Ext.map.zoomPreviousRestore();
    },

    /**
     * Des communes viennent d'etre ajoutées à la carte.
     * Ajoute la carte et le layer à la commune.
     * Highlighte correctement les communes.
     *
     * @param store jsProgdech.store.Communes
     * @param records jsProgdech.model.Commune[]
     **/
    addRecords: function(store, records) {
        Ext.each(records, function(record) {
            var layerCommune = Ext.map.getLayerCommuneByInsee(record.get('insee'));
            record.setLayer(layerCommune);
        }, this);
    },

    /**
     * Retourne la commune dont le point spécifié est à l'intérieur.
     *
     * @param point ([lng,lat] ou L.LatLng) Coordonnées du point.
     *
     * @return layer Layer de la commune (null si aucune)
     **/
    findCommuneFromPoint(point) {
        var layerCommune = Ext.map.findLayerCommuneFromPoint(point);
        return layerCommune === null ? null : layerCommune.commune;
    }
});
