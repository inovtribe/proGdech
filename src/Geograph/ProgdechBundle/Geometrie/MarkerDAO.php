<?php

namespace Geograph\ProgdechBundle\Geometrie;

use Geograph\ProgdechBundle\Geometrie\Marker;

class MarkerDAO
{
    // Dossier app de l'application.
    var $root_dir;

    /**
     * Constructeur.
     * Le paramètre est envoyé par la configuration du service (voir fichier app/config/services.yml)
     *
     * @param root_dir string Dossier app de l'application
     **/
    public function __construct($root_dir)
    {
        $this->root_dir = $root_dir;
    }

    /**
     * Défini un object marker en fonction de son type
     * 
     * @param type $type
     */
    public function setMarker($type = NULL){
        $row['type'] = $type;
        $row['filename'] = $this->setMarkerFilename($type);
        $row['markerwidth'] = $this->setMarkerWidth($row['filename']);
        $row['markerheight'] = $this->setMarkerHeight($row['filename']);
        return $this->buildDomainObject($row);
    }

    /**
     * Défini le fichier image à utiliser comme marker
     * 
     * @param type $type
     */
    public function setMarkerFilename($type){
        switch ($type){
            case('pointcollecte'):
                $filename = '/bundles/geographprogdech/images/markers/pointcollecte_defaut.png';
                break;
            case('bac'):
                $filename = '/bundles/geographprogdech/images/markers/bac_defaut.png';
                break;
            default:
                $filename = '/bundles/geographprogdech/images/markers/defaut.png';
                break;
        }
        return $filename;
    }

    /**
     * Défini la width de l'image
     * 
     * @param type $type
     */
    private function setMarkerWidth($filename){
        list($width) = getimagesize("{$this->root_dir}/../web$filename");
        return $width;
    }

    /**
     * Défini la height de l'image
     * 
     * @param type $type
     */
    private function setMarkerHeight($filename){
	    list($width, $height) = getimagesize("{$this->root_dir}/../web$filename");
	    return $height;
    }

    public function setMarkerInactif(Marker $marker){
        $height = 32;
        $width = (int)($marker->getWidth() * 32 / $marker->getHeight()); 
        $marker->setSize("[$width, $height]");
        $marker->setAnchor("[" . $width / 2 . ", " . $height ."]");
        $marker->setPopupAnchor("[0, " . -$height ."]");
        return $marker;
    }

    public function setMarkerActif(Marker $marker){
        $height = 44;
        $width = (int) ($marker->getWidth() * 44 / $marker->getHeight()); 
        $marker->setSize("[$width, $height]");
        $marker->setAnchor("[" . $width / 2 . ", " . $height ."]");
        $marker->setPopupAnchor("[0, " . -$height ."]");
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
        if (array_key_exists('type', $row)){
            $marker->setType($row['type']);
        }
        if (array_key_exists('filename', $row)){
            $marker->setFilename($row['filename']);
        }
        if (array_key_exists('markerwidth', $row)){
            $marker->setWidth($row['markerwidth']);
        }
        if (array_key_exists('markerheight', $row)){
            $marker->setHeight($row['markerheight']);
        }
        if (array_key_exists('iconanchor', $row)){
            $marker->setAnchor($row['iconanchor']);
        }
        if (array_key_exists('popupanchor', $row)){
            $marker->setPopupAnchor($row['popupanchor']);
        }
        return $marker;
    }
}
