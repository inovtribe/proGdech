/**
 * Controlleur de la view control.Main
 */
Ext.define('jsProgdech.view.control.MainController', {
    extend: 'Ext.app.ViewController',

    alias: 'controller.controlMain',

    /**
     * L'utilisateur demande la création d'un point de collecte.
     * *1*: Demande la référence du point de collecte à créer.
     * 2: Demande la commune à laquelle est liée ce point de collecte.
     * 3: Créer le point de collecte.
     **/
    onCreatePointCollecte: function() {
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
                    this.onCreatePointCollecteStep2(text);
                }
            },
            this
        );
    },

    /**
     * L'utilisateur demande la création d'un point de collecte.
     * 1: Demande la référence du point de collecte à créer.
     * *2*: Demande la commune à laquelle est liée ce point de collecte.
     * 3: Créer le point de collecte.
     *
     * @param reference string Référence du point de collecte à créer.
     **/
    onCreatePointCollecteStep2: function(reference) {
        var controller = this;
        var window = Ext.create('Ext.window.Window', {
            title: "Créer point de collect '" + reference + "'<br/>Sélection de la commune",
            modal: true,
            height: 400,
            width: 350,
            layout: 'fit',
            items: {
                xtype: 'grid',
                border: false,
                store: 'Communes',
                hideHeaders: true,
                columns: [{ dataIndex: 'nom', flex: 1 }],
                listeners: {
                    itemclick: function(button, record) {
                        window.down('button[text=OK]').enable();
                    },
                    itemdblclick: function(button, record) {
                        controller.createPointCollecte(reference, record.get('id'));
                        window.destroy();
                    }
                }
            },
            buttons: [{
                text: 'OK',
                disabled: true,
                handler: function() {
                    var record = window.down('grid').getSelection()[0];
                    controller.createPointCollecte(reference, record.get('id'));
                    window.destroy();
                }
            }, {
                text: 'Annuler',
                handler: function() {
                    window.destroy();
                }
            }]
        }).show();
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
