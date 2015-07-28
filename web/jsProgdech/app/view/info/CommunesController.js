/**
 * Controlleur de la view info.Communes
 */
Ext.define('jsProgdech.view.info.CommunesController', {
    extend: 'Ext.app.ViewController',

    alias: 'controller.infoCommunes',

    /**
     * Initialisation.
     **/
    init: function(view) {
        // Écoute du store des Communes.
        var storeCommunes = Ext.getStore('Communes');
        storeCommunes.on('load', this.refreshView);
        storeCommunes.on('update', this.refreshView);

        // Écoute du store des Points de collecte.
        var storePointsCollecte = Ext.getStore('PointsCollecte');
        storePointsCollecte.on('load', this.refreshView);
    },

    /**
     * Recalcule les données à afficher dans la vue.
     **/
    refreshView: function() {
        // Calcule uniquement sur les communes sélectionnées.
        var storeCommunes = Ext.getStore('Communes');
        var communes = storeCommunes.query('select', true);

        var countPointsCollecte = 0;
        communes.each(function(commune) {
            countPointsCollecte += commune.getPointsCollecte().length;
        });

        // Transmets les données à la vue.
        var panel = Ext.getCmp('infoCommunes');
        panel.getViewModel().setData({
            countCommune: communes.length,
            countPointsCollecte: countPointsCollecte
        });
    }
});

