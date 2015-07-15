<?php

namespace Geograph\ProgdechBundle\Geometrie;

Class Carte {
    
    /**
     * Carte div (Nom du calque support de l'affichage).
     *
     * @var string
     */
    private $div;
    
    /**
     * Carte Latitude Vue.
     *
     * @var string
     */
    private $latitudeview;
    
    /**
     * Carte Longitude Vue.
     *
     * @var string
     */
    private $longitudeview;
    
    /**
     * Carte zoom.
     *
     * @var int
     */
    private $zoom;
    
    public function getDiv(){
        return $this->div;
    }
    public function setDiv($div){
        $this->div = $div;
    }
    
    public function getLatitudeView(){
        return $this->latitudeview;
    }
    public function setLatitudeView($latitude){
        $this->latitudeview = $latitude;
    }
    
    public function getLongitudeView(){
        return $this->longitudeview;
    }
    public function setLongitudeView($longitude){
        $this->longitudeview = $longitude;
    }
    
    public function getZoom(){
        return $this->zoom;
    }
    public function setZoom($zoom){
        $this->zoom = $zoom;
    }
}