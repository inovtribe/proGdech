/**
 * Affiche la liste des communes d'après le store 'Communes'.
 */
Ext.define('jsProgdech.view.control.Communes', {
    extend: 'Ext.grid.Panel',
    alias: ['widget.controlCommunes'],

    requires: [
        'jsProgdech.view.control.CommunesController',
    ],

    controller: 'controlCommunes',

    store: 'Communes',
    columns: [
        { xtype: 'checkcolumn', text: 'Select', dataIndex: 'select', width: 30 },
        { text: 'Name', dataIndex: 'nom', flex: 1 }
    ],
    hideHeaders: true,

    listeners: {
        cellclick: 'onCellClick',
        itemdblclick: 'onItemDblClick',
        itemmouseenter: 'onItemMouseEnter',
        itemmouseleave: 'onItemMouseLeave'
    }
});
