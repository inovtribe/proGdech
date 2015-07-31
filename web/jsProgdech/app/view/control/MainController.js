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
        // Commune du point central.
        var commune = Ext.getStore('Communes').findCommuneFromPoint(Ext.map.getCenter());
        if (commune === null) {
            Ext.Msg.alert('Création impossible', 'Vous devez etre situé sur une commune (point central de la carte).');
            return;
        }

        // Vérifie qu'un point de collecte n'existe pas à proximité.
        if (Ext.getStore('PointsCollecte').getPointsCollecteInsideRange(Ext.map.getCenter(), 10).length > 0) {
            Ext.Msg.alert('Création impossible', 'Un point de collecte existe déjà à proximité.');
            return;
        }

        Ext.Msg.prompt(
            'Créer point de collecte',
            'Référence&nbsp;:',
            function(btn, text) {
                text = text.trim(); // Supprime les espaces inutiles.
                if ((btn == 'ok') && (text != '')) {
                    this.createPointCollecte(text, commune.get('id'));
                }
            },
            this
        );
    },

    /**
     * Créé un point de collecte.
     *
     * @param reference string Référence du point de collecte à créer.
     * @param commune_id integer Identifiant de la commune liée.
     **/
    createPointCollecte: function(reference, commune_id) {
        var center = Ext.map.getCenter();

        // Création du point de collecte en local.
        var pointCollecte = Ext.create('jsProgdech.model.PointCollecte', {
            reference: reference,
            latitude: center.lat,
            longitude: center.lng,
            commune_id: commune_id
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
