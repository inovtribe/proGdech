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
        fieldLabel: 'Référence',
        bind: '{reference}'
    }, {
        xtype: 'displayfield',
        fieldLabel: 'Crée le',
        bind: '{date_creation}'
    }, {
        xtype: 'displayfield',
        fieldLabel: 'Par',
        bind: '{createur}'
    }],

    tbar: [{
        text: 'Déplacer',
        name: 'buttonDragging',
        enableToggle: true,
        handler: 'onToggleDraggable'
    }]
});

