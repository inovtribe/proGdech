Ext.define('jsProgdech.model.Commune', {
    extend: 'Ext.data.Model',
    fields: [
        {name: 'id',  type: 'integer'},
        {name: 'name',  type: 'string'},
        {name: 'insee', type: 'string'}
    ],

    schema: {
        namespace: 'jsProgdech.model',  // generate auto entityName

        proxy: {
            type: 'ajax',
	    url: 'communes.json',
            reader: {
                type: 'json',
                rootProperty: 'communes'
            }
        }
    }
});
