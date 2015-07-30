/**
 * Controlleur de Map
 */
Ext.define('jsProgdech.view.map.MapController', {
    extend: 'Ext.app.ViewController',

    alias: 'controller.map',

    /**
     * Le panel contenant la carte vient d'etre redimenssionné: informe la carte !
     *
     * @param panel jsProgdech.view.map.Panel
     **/
    onResize: function() {
        if (Ext.map !== null) {
            Ext.map.invalidateSize();
        }
    },

    /**
     * Sélectionne d'une commune:
     *  - Ne sélectionne que cette commune.
     *  - Centre la carte sur la commune.
     *
     * @param panel jsProgdech.view.map.Panel
     * @param insee string N° INSEE de la commune.
     **/
    doSelectCommune: function(panel, insee) {
        var storeCommunes = Ext.getStore('Communes');
        var commune = storeCommunes.findRecord('insee', insee);

        // Sélectionne la commune.
        // Déselectionne toutes les autres communes.
        storeCommunes.each(function(record) {
            record.set('select', record.get('insee') == insee);
        });

        // Zoome sur la commune.
        Ext.map.fitBounds(commune.layer.getBounds());
    },

    /**
     * Créé la map Leaflet dans le panel spécifié.
     * La map est ensuite accessible dans Ext.map
     *
     * @param panel jsProgdech.view.map.Panel
     **/
    createMap: function(panel) {
        if (Ext.map === null) {
            // Création de la carte.
            Ext.map = new ProGDechMap(panel.id);

            // Zoom initial.
            Ext.map.doZoomInitial();
        }
    }
});
