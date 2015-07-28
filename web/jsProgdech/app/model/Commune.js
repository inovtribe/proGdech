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
        /*
        this.pointCollectes(function(pointsCollecte) {
            pointsCollecte.each(function(pointCollecte) {
                pointCollecte.deleteMarkers(map);
            });
        });
       */
    },

    /**
     * Retourne tous les points de collectes associés à la commune.
     *
     * @return jsProgdech.model.pointCollecte[]
     **/
    getPointsCollecte: function() {
        return Ext.getStore('PointsCollecte').query('commune_id', this.get('id'));
    }
});
