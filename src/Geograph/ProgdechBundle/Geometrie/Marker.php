<?php

namespace Geograph\ProgdechBundle\Geometrie;

Class Marker {

    // Types de marker.
    const TYPE_DEFAULT = 0;
    const TYPE_POINT_COLLECTE = 1;
    const TYPE_BAC = 2;
    const TYPE_VOLONTAIRE = 3;

    // Attributs du marker.
    private $type;	// Type du marker.
    private $filename;	// Image ressource.
    private $width;	// Largeur de l'image.
    private $height;	// Hauteur de l'image.
    private $size;	// Tailler du marker.
    private $anchor;	// Icon anchor.
    private $popupanchor;// Popup anchor.

    // Dossier app de l'application.
    private $root_dir;

    /**
     * Constructeur.
     *
     * @param type integer Type du marker.
     * @param actif boolean true si le marker est actif, false sinon.
     * @param root_dir string Dossier app de l'application
     **/
    public function __construct($type, $actif, $root_dir)
    {
	$this->root_dir = $root_dir;
	$this->setType($type);
	$this->setActif($actif);
    }

    public function setType($type){
        $this->type = $type;

        switch ($type){
            case(self::TYPE_POINT_COLLECTE):
		$filename = 'pointcollecte_defaut.png';
                break;
            case(self::TYPE_BAC):
		$filename = 'bac_defaut.png';
                break;
            case(self::TYPE_VOLONTAIRE):
		$filename = 'pointcollecte_volontaire.png';
                break;
            default:
		$filename = 'defaut.png';
                break;
        }

	$this->setFilename('/bundles/geographprogdech/images/markers/'.$filename);
    }

    protected function setFilename($filename){
        $this->filename = $filename;

	list($width, $height) = getimagesize("{$this->root_dir}/../web$filename");
	$this->width = $width;
	$this->height = $height;
    }

    /**
     * Positionne le marker comme actif ou non.
     *
     * @param state boolean True pour marker actif, false pour marker inactif.
     **/ 
    public function setActif($state){
        $height = $state ? 44 : 32;
        $width = (int) ($this->width * $height / $this->height);
        $this->size = "[$width, $height]";
        $this->anchor = "[" . $width / 2 . ", " . $height ."]";
        $this->popupanchor = "[0, " . -$height ."]";
    } 

    // Getters et Setters --------------------------------------------------------- 

    public function getType(){
	    return $this->type;
    }
    public function getFilename(){
	    return $this->filename;
    }
    public function getWidth(){
	    return $this->width;
    }
    public function getHeight(){
	    return $this->height;
    }
    public function getSize(){
	    return $this->size;
    }
    public function setSize($size){
	    $this->size = $size;
    }
    public function getAnchor(){
	    return $this->anchor;
    }
    public function getPopupAnchor(){
	    return $this->popupanchor;
    }
}
