Ext.define('jsProgdech.model.Commune', {
    extend: 'Ext.data.Model',
    fields: [
        {name: 'id',  type: 'integer'},
        {name: 'nom',  type: 'string'},
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
    },

    // Supprime tous les markers liés à la commune.
    deleteMarkers: function(map) {
	this.pointCollectes(function(pointsCollecte) {
		pointsCollecte.each(function(pointCollecte) {
			pointCollecte.deleteMarkers(map);
		});
	});
    }
});
