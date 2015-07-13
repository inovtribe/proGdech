<?php

namespace Geograph\ProgdechBundle\Geometrie;

use Geograph\ProgdechBundle\Geometrie\Carte;

use Doctrine\ORM\EntityManager;

class CarteDAO
{
    public function displayMap(){
        $carte = new Carte();
        
        // Centrage de la vue
        $view = "[44.126407, 1.231028]";
        // Définition du niveau de zoom
        $zoom = 13;
        // Définition de l'échelle
        $scale = "{metric: true, imperial: false}";
        
        $carte->setView($view);
        $carte->setZoom($zoom);
        $carte->setScale($scale);
        
        // Ecriture du script
        $geometrie = "var geojson = L.geoJson(gestionnairelimits);"
                . "geojson.setStyle({\"color\": 'gray', \"weight\": 1, \"fill\" : true, smoothFactor: 1, \"fillOpacity\": 0.10});"
                . "\n\t\t\ttopomap = " . $carte->getTopoLayer()
                . "\n\t\t\taerialview = " . $carte->getAerialLayer()
                . "\n\t\t\tvar baseMaps = {\"Carte\": topomap, \"Vue aerienne\": aerialview};"
                . "\n\t\t\tvar overlayMaps = {};"
                . "\n\t\t\tvar map = L.map('map', {minZoom: 10, layers: [topomap, geojson]});"
                . "\n\t\t\tL.control.layers(baseMaps, overlayMaps).addTo(map);"
                . "\n\t\t\tvar scale = L.control.scale(" . $carte->getScale() . ").addTo(map);"
                . "\n\t\t\tmap.fitBounds(geojson.getBounds()).setMaxBounds(geojson.getBounds());";
        return $geometrie;
    }
}
