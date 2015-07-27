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
        var mapPanel = Ext.getCmp('map');
	mapPanel.fireEvent('highlightCommune', mapPanel, record.get('insee'), true);
    },

    /**
     * L'utilisateur quitte le survol d'une commune.
     * Supprime la surbrillance de la commune sur la carte.
     *
     * @param view jsProgdech.view.control.Communes
     * @param record jsProgdech.model.Commune
     **/
    onItemMouseLeave: function(view, record) {
        var mapPanel = Ext.getCmp('map');
	mapPanel.fireEvent('highlightCommune', mapPanel, record.get('insee'), false);
    },

    /**
     * L'utilisateur clique sur une commune.
     *
     * @param view jsProgdech.view.control.Communes
     * @param record jsProgdech.model.Commune
     **/
    onItemClick: function(view, record) {
        var mapPanel = Ext.getCmp('map');
	mapPanel.fireEvent('selectCommune', mapPanel, record.get('insee'));
    }
});
