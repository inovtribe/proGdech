/**
 * Controlleur de la view control.Main
 */
Ext.define('jsProgdech.view.control.MainController', {
    extend: 'Ext.app.ViewController',

    alias: 'controller.controlMain',

    /**
     * L'utilisateur demande la création d'un point de collecte.
     * 1: Demande la référence du point de collecte à créer.
     * 2: Créer le point de collecte.
     **/
    onCreatePointCollecte: function() {
        this.createPointCollecte('TEST');
        return;
        Ext.Msg.prompt(
            'Créer point de collecte',
            'Référence&nbsp;:',
            function(btn, text) {
                text = text.trim(); // Supprime les espaces inutiles.
                if ((btn == 'ok') && (text != '')) {
                    this.createPointCollecte(text);
                }
            },
            this
        );
    },

    /**
     * Créé un point de collecte.
     *
     * @param reference string Référence du point de collecte à créer.
     **/
    createPointCollecte: function(reference) {
        var mapPanel = Ext.getCmp('map');
        var map = mapPanel.map;
        var center = map.getCenter();

        // Création du point de collecte en local.
        var pointCollecte = Ext.create('jsProgdech.model.PointCollecte', {
            reference: reference,
            latitude: center.lat,
            longitude: center.lng,
            commune_id: 5
        });

        // Enregistre le point de collecte sur le serveur.
        pointCollecte.save({
            success: function(record, operation) {
                // Le point de collecte a été créé: on l'ajoute au store et on le sélectionne.
                Ext.getStore('PointsCollecte').add(pointCollecte);
                pointCollecte.set('select', true);
            },
            scope: this
        });
    }
});
