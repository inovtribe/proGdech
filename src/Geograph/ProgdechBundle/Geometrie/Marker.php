<?php

namespace Geograph\ProgdechBundle\Geometrie;

Class Marker {
    
    /** Marker type.
     *
     * @var string
     */
    private $type;
    
    /** Marker image ressource.
     *
     * @var string
     */
    private $filename;
    
    /**icon width.
     *
     * @var string
     */
    private $width;
    
    /**icon height.
     *
     * @var string
     */
    private $height;
    
    /**marker size.
     *
     * @var string
     */
    private $size;
    
    
    /**icon anchor.
     *
     * @var string
     */
    private $anchor;
    
    /**popup anchor.
     *
     * @var string
     */
    private $popupanchor;
    
    public function getType(){
        return $this->type;
    }
    public function setType($type){
        $this->type = $type;
    }
    
    public function getFilename(){
        return $this->filename;
    }
    public function setFilename($filename){
        $this->filename = $filename;
    }
    
    public function getWidth(){
        return $this->width;
    }
    public function setWidth($width){
        $this->width = $width;
    }
    
    public function getHeight(){
        return $this->height;
    }
    public function setHeight($height){
        $this->height = $height;
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
    public function setAnchor($anchor){
        $this->anchor = $anchor;
    }
    
    public function getPopupAnchor(){
        return $this->popupanchor;
    }
    public function setPopupAnchor($popupanchor){
        $this->popupanchor = $popupanchor;
    }
}
