/**
 * Paneau de controle (colonne de droite)
 */
Ext.define('jsProgdech.view.control.Main', {
    extend: 'Ext.panel.Panel',
    alias: ['widget.controlMain'],
    id: 'control',

    requires: [
        'jsProgdech.view.control.Communes',
        'jsProgdech.view.control.MainController'
    ],

    controller: 'controlMain',

    layout: 'fit',
    collapsible: true,
    width: 250,
    title: 'proGdech',
    border: true,
    items: [{
        xtype: 'controlCommunes'
    }],

    tools: [{
        type: 'gear',
        handler: function(event, toolEl, panelHeader) {
            var menu = Ext.create('Ext.menu.Menu', {
                items: [{
                    text: 'Créer point de collecte',
                    handler: function() { 
                        Ext.getCmp('control').fireEvent('onCreatePointCollecte');
                    }
                }]
            });
            menu.showBy(toolEl);
        }
    }],

    listeners: {
        onCreatePointCollecte: 'onCreatePointCollecte'
    }
});
