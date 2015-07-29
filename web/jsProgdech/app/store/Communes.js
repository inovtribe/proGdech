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
        /**
         * Le record d'une commune vient d'etre modifié.
         * Ajuste la map si c'est le champs select qui a été modifié.
         *
         * Déselectionne le point de collecte sélectionné.
         **/
        'update': function(store, record) {
            // Déselectionne le point de collecte.
            var pointCollecteSelected = Ext.getStore('PointsCollecte').findRecord('select', true);
            if (pointCollecteSelected !== null) {
                pointCollecteSelected.set('select', false);
            }

            record.doHighlight(false);
        },

        /**
         * Le store des communes vient d'etre lu.
         * Renseigne les communes sur la map et son layer.
         * Highlighte correctement les communes.
         **/
        'load': function(store, record) {
            var mapPanel = Ext.getCmp('map');

            store.each(function(record) {
                var layerCommune = mapPanel.getController().getLayerCommuneByInsee(mapPanel, record.get('insee'));
                record.map = mapPanel.map;
                //record.layer = layerCommune;
                record.setLayer(layerCommune);
                layerCommune.commune = record;

                record.doHighlight(false);
            }, this);
        }
    }
});
