/**
 * Panel d'une carte
 */
Ext.define('jsProgdech.view.map.Panel', {
    extend: 'Ext.panel.Panel',
    alias: ['widget.map'],
    id: 'map',

    requires: [
        'jsProgdech.view.map.MapController',
    ],

    controller: 'map',

    listeners: {
        afterlayout: 'createMap',
        selectOneCommune: 'doSelectCommune',
        selectCommune: 'selectCommune',
        resize: 'onResize'
    },

    map: null,	// Pas de carte à l'initialisation.
    geojson: null
});
