/**
 * Paneau de controle (colonne de droite)
 */
Ext.define('jsProgdech.view.control.Main', {
    extend: 'Ext.panel.Panel',
    alias: ['widget.controlMain'],
    id: 'control',

    requires: [
        'jsProgdech.view.control.Communes'
    ],

    layout: 'fit',
    collapsible: true,
    width: 250,
    title: 'proGdech',
    border: true,
    items: [{
        xtype: 'controlCommunes'
    }]
});
