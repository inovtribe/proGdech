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
        },

        /**
         * Un point de collecte vient d'etre modifié.
         * Affiche le marker (s'il est marqué sélectionné ou non).
         **/
        'update': function(store, record, operation, modifiedFieldNames) {
            if ((modifiedFieldNames !== null) && (modifiedFieldNames.indexOf('select') !== -1)) {
                record.displayMarker();

                // Vérifie si le marker a été déplacé sans etre enregistré.
                if ((typeof(record.getModified('longitude')) !== 'undefined') || (typeof(record.getModified('latitude')) !== 'undefined')) {
                    Ext.Msg.show({
                        title: 'Enregistrer les modifications ?',
                        msg: "Le point de collecte '" + record.get('nom') + "' a été déplacé sans etre enregistré.",
                        icon: Ext.Msg.QUESTION,
                        closable: false,
                        buttons: Ext.Msg.OKCANCEL,
                        fn: function(btn) {
                            if (btn === 'ok') {
                                record.save();
                            }
                        }
                    });
                }
            }
        }
    }
});
