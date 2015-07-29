Ext.define('jsProgdech.store.PointsCollecte', {
    extend: 'Ext.data.Store',
    alias: 'store.pointscollecte',
    model: 'jsProgdech.model.PointCollecte',
    autoLoad: true,

    listeners: {
        /**
         * Le store des points de collecte vient d'etre lu.
         * Renseigne les points de collecte sur le map.
         * Affiche correctement les markers.
         **/
        'load': function(store, records) {
            var mapPanel = Ext.getCmp('map');

            store.each(function(record) {
                record.map = mapPanel.map;
                record.displayMarker();
            }, this);
        }
    }
});

