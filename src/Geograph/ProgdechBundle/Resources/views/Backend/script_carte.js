var geojson = L.geoJson(gestionnairelayer);
            geojson.setStyle({"color": 'red', "weight": 1, "fill" : true, smoothFactor: 1, "fillOpacity": 0.025});
            var topo = L.tileLayer('{{ topolayer.url|raw }}', {attribution: '{{ topolayer.attribution|raw }}'});
            var aerial = L.tileLayer('{{ aeriallayer.url|raw }}', {attribution: '{{ aeriallayer.attribution|raw }}'});
            var baseMaps = {"Carte": topo, "Vue aerienne": aerial};
            var overlayMaps = {};
            var map = L.map('{{ carte.div|raw }}', {center: [{{ carte.latitudeview|raw }}, {{ carte.longitudeview|raw }}], zoom: {{ carte.zoom|raw }}, layers: [topo, geojson]});
            L.control.layers(baseMaps, overlayMaps).addTo(map);