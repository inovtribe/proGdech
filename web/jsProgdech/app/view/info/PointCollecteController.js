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
        storePointsCollecte.on('update', this.onUpdatePointCollecte, this);
    },

    /**
     * Un point de collecte vient d'etre modifié.
     * Raffraichit la vue uniquement si changement de point de collecte.
     **/
    onUpdatePointCollecte: function(store, record, operation, modifiedFieldNames) {
        if (modifiedFieldNames.indexOf('select') !== -1) {
            this.refreshView();
        }
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

        var button = panel.down('button[name=buttonDragging]');
        button.setText('Déplacer');
        button.setPressed(false);
    },

    /**
     * L'utilisateur vient de presser le boutton pour pouvoir déplacer le point de collecte.
     **/
    onToggleDraggable: function(button) {
        var pointCollecte = Ext.getStore('PointsCollecte').findRecord('select', true);
        if (pointCollecte !== null) {
            pointCollecte.setDraggable(button.pressed);

            if (button.pressed === true) {
                button.setText('Enregistrer');
            }
            else {
                button.setText('Déplacer');

                // Enregistre le point de collecte.
                pointCollecte.save();
            }
        }
    }
});
