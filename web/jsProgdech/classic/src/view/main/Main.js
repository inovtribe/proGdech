/**
 * Page principale avec menu.
 */
Ext.define('jsProgdech.view.main.Main', {
    extend: 'Ext.panel.Panel',
    xtype: 'app-main',

    layout:  'fit',

    requires: [
        'Ext.plugin.Viewport',

        //'jsProgdech.view.main.MainController',
        //'jsProgdech.view.main.MainModel',
        //'jsProgdech.view.main.List'
        'jsProgdech.view.map.Panel'
    ],

    controller: 'main',
    //viewModel: 'main',

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

    items: [{
       xtype: 'map'
    }]
});
