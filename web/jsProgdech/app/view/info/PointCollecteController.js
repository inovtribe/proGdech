/**
 * Controlleur de la view info.PointCollecte
 */
Ext.define('jsProgdech.view.info.PointCollecteController', {
    extend: 'Ext.app.ViewController',

    alias: 'controller.infoPointCollecte',

    /**
     * Initialisation.
     **/
    init: function(view) {

        // Écoute du store des Communes.
        var storeCommunes = Ext.getStore('Communes');
        storeCommunes.on('update', this.onUpdateCommune);

        // Écoute du store des Points de collecte.
        var storePointsCollecte = Ext.getStore('PointsCollecte');
        storePointsCollecte.on('update', this.refreshView, this);
    },
    
    /**
     * Une commune vient d'etre modifiée.
     * Masque cette vue.
     **/
    onUpdateCommune: function() {
        var panel = Ext.getCmp('infoPointCollecte');
        panel.setVisible(false);
    },

    /**
     * Recalcule les données à afficher dans la vue.
     **/
    refreshView: function() {
        var pointCollecteSelected = Ext.getStore('PointsCollecte').findRecord('select', true);
        var panel = Ext.getCmp('infoPointCollecte');

        // Affiche ou masque le panneau.
        panel.setVisible(pointCollecteSelected !== null);

        if (pointCollecteSelected === null) {
            // Rien à calculer.
            return;
        }

        // Transmets les données à la vue.
        panel.getViewModel().setData({
            reference: pointCollecteSelected.get('reference'),
            date_creation: Ext.Date.format(pointCollecteSelected.get('date_creation'), 'd M Y'),
            createur: pointCollecteSelected.get('createur')
        });
    }
});
