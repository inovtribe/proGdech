/**
 * Affiche la liste des communes d'après le store 'Communes'.
 */
Ext.define('jsProgdech.view.control.Communes', {
    extend: 'Ext.view.View',
    alias: ['widget.controlCommunes'],

    requires: [
        //'jsProgdech.view.map.MapController',
    ],

    title: 'Communes',
    layout: 'fit',
    border: true,
    autoScroll: true,
    padding: '0 3',

    store: 'Communes',
    tpl: new Ext.XTemplate(
        '<div>{[values.length]} communes&nbsp;:</div>',
        '<tpl for=".">',
            '<div class="commune-tpl {[xindex % 2 === 0 ? "even" : "odd"]}">',
                '<strong>{nom}</strong>: {pointCollectes.length} points de collecte | x bacs',
            '</div>',
        '</tpl>'
    ),
    itemSelector: 'div.commune-tpl',
    emptyText: 'Communes indisponibles'
});
