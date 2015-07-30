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
