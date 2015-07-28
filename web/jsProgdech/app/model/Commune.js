Ext.define('jsProgdech.model.Commune', {
    extend: 'Ext.data.Model',
    fields: [
        {name: 'id',  type: 'integer'},
        {name: 'nom',  type: 'string'},
        {name: 'insee', type: 'string'},
        {name: 'select', type: 'boolean', defaultValue: true}   // Extjs uniquement : sélectionnée ou pas.
    ],

    map: null,      // Map où la commune est affichée.
    layer: null,    // Layer utilisé pour représenter la commune.

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
    },

    /**
     * Highlighte la commune.
     *
     * @param state boolean true pour highlight, sinon supprime le highligth.
     **/
    doHighlight: function(state) {
        if ((state === true) || (this.get('select') === true)) {
            // Highlight normal ou sélectionné.
            this.layer.setStyle({
                weight: 2,
                color: state === true ? 'green' : 'red',
                dashArray: '',
                fillOpacity: state === true ? 0.15 : 0.04
            });

            if (!L.Browser.ie && !L.Browser.opera) {
                this.layer.bringToFront();
            }
        }
        else {
            // Pas de highlight.
            this.map.myGeojson.resetStyle(this.layer);
        }
    }
});
