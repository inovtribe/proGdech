/**
 * Controlleur général.
 * Écoute des évènements globaux.
 **/
Ext.define('jsProgdech.controller.Main', {
    extend: 'Ext.app.Controller',

    listen: {
        global: {
            selectOneCommune: 'doSelectCommune'
        }
    },

    /**
     * Sélectionne d'une commune:
     *  - Ne sélectionne que cette commune.
     *  - Centre la carte sur la commune.
     *
     * @param commune jsProgdech.model.Commune La Commune.
     **/
    doSelectCommune: function(commune) {
        var id = commune.get('id');

        // Sélectionne la commune.
        // Déselectionne toutes les autres communes.
        Ext.getStore('Communes').each(function(record) {
            record.set('select', record.get('id') == id);
        });

        // Zoome sur la commune.
        Ext.map.fitBounds(commune.layer.getBounds());
    }
});
