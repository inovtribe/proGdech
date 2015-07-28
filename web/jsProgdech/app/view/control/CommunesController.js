/**
 * Controlleur de la view control.Communes
 */
Ext.define('jsProgdech.view.control.CommunesController', {
    extend: 'Ext.app.ViewController',

    alias: 'controller.controlCommunes',

    /**
     * L'utilisateur survole un nom de commune.
     * Mets en surbrillance la commune sur la carte.
     *
     * @param view jsProgdech.view.control.Communes
     * @param record jsProgdech.model.Commune
     **/
    onItemMouseEnter: function(view, record) {
        record.doHighlight(true);
    },

    /**
     * L'utilisateur quitte le survol d'une commune.
     * Supprime la surbrillance de la commune sur la carte.
     *
     * @param view jsProgdech.view.control.Communes
     * @param record jsProgdech.model.Commune
     **/
    onItemMouseLeave: function(view, record) {
        record.doHighlight(false);
    },
    
    /**
     * L'utilisateur double clique sur une commune.
     * Sélectionné la commune.
     *
     *
     * @param view jsProgdech.view.control.Communes
     * @param record jsProgdech.model.Commune
     **/
    onItemDblClick: function(view, record) {
        var mapPanel = Ext.getCmp('map');
        mapPanel.fireEvent('selectOneCommune', mapPanel, record.get('insee'));
    },

    /**
     * L'utilisateur clique sur une cellule d'une commune.
     *
     * @param view jsProgdech.view.control.Communes
     * @param td string
     * @param cellIndex integer Position de la cellule cliquée (0 pour 1ère colonne, 1 pour la 2ième etc.)
     * @param record jsProgdech.model.Commune
     **/
    onCellClick: function(view, td, cellIndex, record) {
        if (cellIndex !== 0) {
            record.set('select', ! record.get('select'));
        }
    },

    /**
     * Sélectionne toutes les communes.
     **/
    onButtonToutes: function() {
        Ext.getStore('Communes').each(function(record) {
            record.set('select', true);
        });
    },

    /**
     * Déselectionne toutes les communes.
     **/
    onButtonNone: function() {
        Ext.getStore('Communes').each(function(record) {
            record.set('select', false);
        });
    },

    /**
     * Revient au zoom initial sur la carte.
     **/
    onZoomInitial: function() {
        var mapPanel = Ext.getCmp('map');
        mapPanel.fireEvent('zoomInitial', mapPanel);
    }
});
