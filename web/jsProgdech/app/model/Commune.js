Ext.define('jsProgdech.model.Commune', {
    extend: 'Ext.data.Model',
    fields: [
        {name: 'id',  type: 'integer'},
        {name: 'nom',  type: 'string'},
        {name: 'insee', type: 'string'},
        {name: 'superficie', type: 'number'},
        {name: 'population',  type: 'integer'},
        {name: 'select', type: 'boolean', defaultValue: true}   // Extjs uniquement : sélectionnée ou pas.
    ],

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
     * Raffraichit les markers de la commune.
     *
     * @param state boolean true pour highlight, sinon supprime le highlight.
     **/
    doHighlight: function(state) {
        if ((state === true) || (this.get('select') === true)) {
            // Highlight de la commune: normal ou sélectionné.
            this.layer.setStyle({
                weight: 2,
                opacity: 0.5,
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
            Ext.map.myGeojson.resetStyle(this.layer);
        }

        // Raffraichit les markers de la commune.
        this.getPointsCollecte().each(function(pointCollecte) {
            pointCollecte.displayMarker();
        }, this);
    },

    /**
     * Assigne un layer à la commune.
     *
     * @param layer Layer
     **/
    setLayer: function(layer) {
        if (layer === null) {
            return;
        }

        this.layer = layer;

        layer.bindLabel(
            '<h4>' + this.get('nom') + '</h4>'
        );

        this.doHighlight(false);

        // Évènements sur le layer.
        layer.on({
            // Active le highlight de la commune.
            mouseover: function() {
                this.doHighlight(true);
            },

            // Supprime le highlight de la commune.
            mouseout: function() {
                this.doHighlight(false);
            },

            // Dé/Sélectionne la commune.
            click: function() {
                this.set('select', ! this.get('select'));
            },

            // Ne sélectionne que cette commune.
            dblclick: function() {
                var panel= Ext.getCmp('map');
                panel.fireEvent('selectOneCommune', panel, this.get('insee'));
            }
        }, this);
    }
});
