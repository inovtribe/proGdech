<?php

namespace Geograph\ProgdechBundle\Geometrie;

use Geograph\ProgdechBundle\Geometrie\Marker;

class MarkerDAO
{
    public function setInactifMarker() {
        $row['iconurl'] = '/bundles/geographprogdech/images/markers/pointcollecte_defaut.png';
        $row['iconsize'] = '[21, 32]';
        $row['iconanchor'] = '[10, 32]';
        $row['popupanchor'] = '[0, -32]';
        
        return $this->buildDomainObject($row);
    }
    
    public function setActifMarker(){
        $row['iconurl'] = '/bundles/geographprogdech/images/markers/pointcollecte.png';
        $row['iconsize'] = '[29, 44]';
        $row['iconanchor'] = '[14, 44]';
        $row['popupanchor'] = '[0, -44]';
        
        return $this->buildDomainObject($row);
    }
    
    public function setMarker_volontaire(){
        $marker = "inactif_marker = L.icon({
            iconUrl: ''/bundles/geographprogdech/images/markers/ptcollecte_volontaire.png',

            iconSize:     [29, 32], // size of the icon
            iconAnchor:   [22, 32], // point of the icon which will correspond to marker's location
            popupAnchor:  [-3, -76] // point from which the popup should open relative to the iconAnchor
        });";
        return $marker;
    }
    
    /**
     * Créé un objet Marker basé sur les données.
     *
     * @param array .
     * @return \proGdech\Geometrie\Marker
     */
    protected function buildDomainObject($row) {
        $marker = new Marker();
        if (array_key_exists('iconurl', $row)){
            $marker->setIconUrl($row['iconurl']);
        }
        if (array_key_exists('shadowurl', $row)){
            $marker->setShadowUrl($row['shadowurl']);
        }
        if (array_key_exists('iconsize', $row)){
            $marker->setIconSize($row['iconsize']);
        }
        if (array_key_exists('shadowsize', $row)){
            $marker->setShadowSize($row['shadowsize']);
        }
        if (array_key_exists('iconanchor', $row)){
            $marker->setIconAnchor($row['iconanchor']);
        }
        if (array_key_exists('shadowanchor', $row)){
            $marker->setShadowAnchor($row['shadowanchor']);
        }
        if (array_key_exists('popupanchor', $row)){
            $marker->setPopupAnchor($row['popupanchor']);
        }
        return $marker;
    }
}
