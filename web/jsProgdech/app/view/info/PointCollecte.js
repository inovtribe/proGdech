/**
 * Information sur le point de collecte sélectionné.
 */
Ext.define('jsProgdech.view.info.PointCollecte', {
    extend: 'Ext.panel.Panel',
    alias: ['widget.infoPointCollecte'],
    id: 'infoPointCollecte',

    requires: [
        'jsProgdech.view.info.PointCollecteController',
        'jsProgdech.view.info.PointCollecteView',
    ],

    controller: 'infoPointCollecte',
    viewModel: 'infoPointCollecte',

    title: 'Point de collecte',
    bodyPadding: '0 3',

    items: [{
        xtype: 'displayfield',
        fieldLabel: 'Communes',
        bind: '{countCommune}'
    }, {
        xtype: 'displayfield',
        fieldLabel: 'Superficie',
        bind: '{superficie} km²'
    }, {
        xtype: 'displayfield',
        fieldLabel: 'Population',
        bind: '{population} hab'
    }, {
        xtype: 'displayfield',
        fieldLabel: 'Densité',
        bind: '{densite} hab/km²'
    }, {
        xtype: 'displayfield',
        fieldLabel: 'Points de collecte',
        bind: '{countPointsCollecte}'
    }]
});

