/**
 * Toolbar générale.
 */
Ext.define('jsProgdech.view.main.Toolbar', {
    extend: 'Ext.toolbar.Toolbar',
    alias: 'widget.mainToolbar',

    requires: [
        'jsProgdech.view.main.ToolbarController',
    ],

    controller: 'mainToolbar',

    items: [{
        xtype: 'combobox',
        fieldLabel: 'Communes',
        store: 'Communes',
        queryMode: 'local',
        displayField: 'nom',
        valueField: 'id',
        editable: false,
    }]
});
