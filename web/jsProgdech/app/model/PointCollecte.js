Ext.define('jsProgdech.model.PointCollecte', {
    extend: 'Ext.data.Model',
    fields: [
        {name: 'id',  type: 'int'},
        {name: 'nom',  type: 'string'},
        {name: 'latitude',  type: 'number'},
        {name: 'longitude', type: 'number'},
        {name: 'volontaire', type: 'boolean'},
	{name: 'commune', reference: 'Commune', type: 'int'}
    ],

    marker: null,

    showMarkerInMap: function(map) {
        var marker = this.get('volontaire') == true
		? L.icon({
		    iconUrl: '/bundles/geographprogdech/images/markers/pointcollecte_volontaire.png',
		    iconSize:     [32, 32],
		    iconAnchor:   [16, 32],
		    popupAnchor:  [0, -32]
		})
		: L.icon({
		    iconUrl: '/bundles/geographprogdech/images/markers/pointcollecte_defaut.png',
		    iconSize:     [20, 32],
		    iconAnchor:   [10, 32],
		    popupAnchor:  [0, -32]
		});

	marker = L.marker([this.get('latitude'), this.get('longitude')], {icon: marker}).addTo(map);
	marker.bindLabel(
            '<h4>' + this.get('nom') + '</h4>' +
            '<p>X Bacs de type ?</p>' + 
            '<p>X Bacs de type ?</p>');

	marker.pointCollecte = this;

	marker.on('click', function() {
		alert('Clic sur marker du point de collecte ' + marker.pointCollecte.get('nom'));
	});

	this.marker = marker;
    },

    // Supprime tous les markers liés au Point de collecte.
    deleteMarkers: function(map) {
        if (this.marker === null) {
	     return;
	}

	map.removeLayer(this.marker);
	this.marker = null;
    }
});
