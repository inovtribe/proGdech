/**
 * Paneau de controle (colonne de droite)
 */
Ext.define('jsProgdech.view.control.Main', {
    extend: 'Ext.panel.Panel',
    alias: ['widget.controlMain'],

    requires: [
        //'jsProgdech.view.map.MapController',
    ],

    layout: 'accordion',

    items: [{
        title: 'Communes',
        html: 'Panel content!'
    },{
        title: 'Commune',
        html: 'Panel content!'
    },{
    title: 'Panel 3',
    html: 'Panel content!'
    }]

    //controller: 'map',

/*
    listeners: {
        afterlayout: 'createMap',
        selectCommune: 'selectCommune',
	resize: 'onResize'
    },

    map: null	// Pas de carte à l'initialisation.
*/
});
