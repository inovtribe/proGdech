Ext.define('jsProgdech.store.PointsCollecte', {
    extend: 'Ext.data.Store',
    alias: 'store.pointscollecte',
    model: 'jsProgdech.model.PointCollecte',
    autoLoad: true,

    listeners: {
        'add': 'addRecords',
        'load': 'addRecords',
        'update': 'onUpdate'
    },

    /**
     * Des points de collecte ont été ajoutés au store.
     * Renseigne les points de collecte sur la map.
     * Affiche les markers.
     *
     * @param store jsProgdech.store.PointsCollecte
     * @param records jsProgdech.model.PointCollecte[]
     **/
    addRecords: function(store, records) {
        Ext.each(records, function(record) {
            record.displayMarker();
        }, this);
    },

    /**
     * Un point de collecte vient d'etre modifié.
     * Affiche le marker (s'il est marqué sélectionné ou non).
     **/
    onUpdate: function(store, record, operation, modifiedFieldNames) {
        if ((modifiedFieldNames === null) || (Ext.Array.indexOf(modifiedFieldNames, 'select') === -1)) {
            // L'attribut select n'a pas été modifié: on ne fait rien.
            return
        }

        // Actualise l'affichage du marker.
        record.displayMarker();

        if (record.get('select') === true) {
            // Le point de collecte vient d'etre activé.

            // Désélectionne les autres points de collecte sélectionnés.
            Ext.getStore('PointsCollecte').query('select', true).each(function(pointCollecteSelected) {
                if (pointCollecteSelected.get('id') != record.get('id')) {
                    pointCollecteSelected.set('select', false);
                }
            }, this);

            // Sauvegarge le zoom actuel.
            Ext.map.zoomPreviousSave(false);

            // Zoome sur le marker.
            Ext.map.setView([
                record.get('latitude'),
                record.get('longitude')
            ], 16);
        }
        else {
            // Le point de collecte vient d'etre désactivé.

            // Désactive le déplacement du marker.
            record.setDraggable(false);

            if (Ext.getStore('PointsCollecte').findRecord('select', true) === null) {
                // Aucun marker n'est sélectionné : restaure le zoom.
                Ext.map.zoomPreviousRestore();
                return; 
            }
        }

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
});
