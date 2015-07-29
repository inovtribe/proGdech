/**
 * Paneau d'information (colonne de gauche).
 */
Ext.define('jsProgdech.view.info.Main', {
    extend: 'Ext.panel.Panel',
    alias: ['widget.infoMain'],
    id: 'info',

    requires: [
        'jsProgdech.view.info.Communes',
        'jsProgdech.view.info.PointCollecte'
    ],

    layout: 'fit',
    //collapsible: true,
    width: 250,
    border: true,
    items: [{
        xtype: 'infoCommunes'
    }, {
        xtype: 'infoPointCollecte',
        hidden: true
    }]
});
