/**
 * Page principale avec menu.
 */
Ext.define('jsProgdech.view.main.Main', {
    extend: 'Ext.panel.Panel',
    xtype: 'app-main',

    layout:  'border',

    requires: [
        'jsProgdech.view.control.Main',
        'jsProgdech.view.info.Main',
        'jsProgdech.view.main.MainController',
        //'jsProgdech.view.main.Toolbar',
        'jsProgdech.view.map.Panel'
    ],

    controller: 'main',

    /*
    tbar: {
        xtype: 'mainToolbar'
    },
   */

  /*
    lbar: [{
        xtype: 'label',
        text: 'proGdech'
    }, {
        text: 'Tableau de bord'
    }, {
        xtype:'splitbutton',
        text: 'Points de collecte',
        menu: [{
            text: 'Liste des points'
        }, {
            text: 'Ajouter un point'
        }]
    }, {
        xtype:'splitbutton',
        text: 'Bacs',
        menu: [{
            text: 'Liste des bacs'
        }, {
            text: 'Ajouter un bac'
        }, {
            text: 'Modèles de bacs'
        }]
    }, {
        text: 'Tournées'
    }, '->', {
        text: 'Profil',
        menu: [{
            text: 'Mon profil: '
        }, {
            text: 'Paramètres'
        }, '-', {
            text: 'Déconnexion',
            iconCls: 'fa-logout'
        }]
    }],
   */

    items: [{
        xtype: 'map',
        region: 'center'
    }, {
        region: 'east',
        xtype: 'controlMain'
    }, {
        region: 'west',
        xtype: 'infoMain'
    }]
});
