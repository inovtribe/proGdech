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
        storeCommunes.on('update', this.onUpdateCommune, this);

        // Écoute du store des Points de collecte.
        var storePointsCollecte = Ext.getStore('PointsCollecte');
        storePointsCollecte.on('update', this.onUpdatePointCollecte, this);
    },

    /**
     * Un point de collecte vient d'etre modifié.
     * Raffraichit la vue uniquement si changement de point de collecte.
     **/
    onUpdatePointCollecte: function(store, record, operation, modifiedFieldNames) {
        if ((modifiedFieldNames !== null) && (Ext.Array.indexOf(modifiedFieldNames, 'select') !== -1)) {
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
        var pointCollecte = Ext.getStore('PointsCollecte').findRecord('select', true);
        var panel = Ext.getCmp('infoPointCollecte');

        // Affiche ou masque le panneau.
        panel.setVisible(pointCollecte !== null);

        if (pointCollecte === null) {
            // Rien à calculer.
            return;
        }

        // Transmets les données à la vue.
        panel.getViewModel().setData({
            reference: pointCollecte.get('reference'),
            date_creation: Ext.Date.format(pointCollecte.get('date_creation'), 'd M Y'),
            createur: pointCollecte.get('createur')
        });

        // Réinitialise le boutton de déplacement.
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
            // Autorise (ou interdit) le marker du point de collecte à etre déplacé.
            pointCollecte.setDraggable(button.pressed);

            // Modifie le texte du bouton.
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
