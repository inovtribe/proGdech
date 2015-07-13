<?php

namespace Geograph\ProgdechBundle\Geometrie;

Class Carte {
    /**
     * Carte topomap tilelayer.
     *
     * @var string
     */
    private $topomap;
    
    /**
     * Carte aerialmap tilelayer.
     *
     * @var string
     */
    private $aerialmap;
    
    
    /**
     * Carte scale.
     *
     * @var string
     */
    private $scale;
    
    /**
     * Carte zoom.
     *
     * @var int
     */
    private $zoom;
    
    /**
     * Carte view.
     *
     * @var string
     */
    private $view;
    
    public function __construct(){
        $topolayer = "L.tileLayer('http://server.arcgisonline.com/ArcGIS/rest/services/World_Topo_Map/MapServer/tile/{z}/{y}/{x}', {
        attribution: 'Tiles &copy; Esri &mdash; Esri, DeLorme, NAVTEQ, TomTom, Intermap, iPC, USGS, FAO, NPS, NRCAN, GeoBase, Kadaster NL, Ordnance Survey, Esri Japan, METI, Esri China (Hong Kong), and the GIS User Community'
        });";
        $this->setTopoLayer($topolayer);
        $aeriallayer = "L.tileLayer('http://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
	attribution: 'Tiles &copy; Esri &mdash; Source: Esri, i-cubed, USDA, USGS, AEX, GeoEye, Getmapping, Aerogrid, IGN, IGP, UPR-EGP, and the GIS User Community'
        });";
        $this->setAerialLayer($aeriallayer);
    }

    public function getView(){
        return $this->view;
    }
    public function setView($view){
        $this->view = $view;
    }
    
    public function getZoom(){
        return $this->zoom;
    }
    public function setZoom($zoom){
        $this->zoom = $zoom;
    }
    
    public function getTopoLayer(){
        return $this->topomap;
    }
    public function setTopoLayer($topolayer){
        $this->topomap = $topolayer;
    }
    
    public function getAerialLayer(){
        return $this->aerialmap;
    }
    public function setAerialLayer($aeriallayer){
        $this->aerialmap = $aeriallayer;
    }
    
    public function getScale(){
        return $this->scale;
    }
    public function setScale($scale){
        $this->scale = $scale;
    }
}
