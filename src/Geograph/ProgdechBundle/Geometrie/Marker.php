<?php

namespace Geograph\ProgdechBundle\Geometrie;

Class Marker extends Carte {
    /**icon.
     *
     * @var string
     */
    private $iconurl;
    
    /**shadow.
     *
     * @var string
     */
    private $shadowurl;
    
    /**icon size.
     *
     * @var string
     */
    private $iconsize;
    
    /**shadow size.
     *
     * @var string
     */
    private $shadowsize;
    
    /**icon anchor.
     *
     * @var string
     */
    private $iconanchor;
    
    /**shadow anchor.
     *
     * @var string
     */
    private $shadowanchor;
    
    /**popup anchor.
     *
     * @var string
     */
    private $popupanchor;
    
    public function __construct(){
        $iconurl = '/imgs/ptcollecte.png';
        $this->setIconUrl($iconurl);
    }
    
    public function getIconUrl(){
        return $this->iconurl;
    }
    public function setIconUrl($iconurl){
        $this->iconurl = $iconurl;
    }
    
    public function getShadowUrl(){
        return $this->shadowurl;
    }
    public function setShadowUrl($shadowurl){
        $this->shadowurl = $shadowurl;
    }
    
    public function getIconSize(){
        return $this->iconsize;
    }
    public function setIconSize($iconsize){
        $this->iconsize = $iconsize;
    }
    
    public function getShadowSize(){
        return $this->shadowsize;
    }
    public function setShadowSize($shadowsize){
        $this->shadowsize = $shadowsize;
    }
    
    public function getIconAnchor(){
        return $this->iconanchor;
    }
    public function setIconAnchor($iconanchor){
        $this->iconanchor = $iconanchor;
    }
    
    public function getShadowAnchor(){
        return $this->shadowanchor;
    }
    public function setShadowAnchor($shadowanchor){
        $this->shadowanchor = $shadowanchor;
    }
    
    public function getPopupAnchor(){
        return $this->popupanchor;
    }
    public function setPopupAnchor($popupanchor){
        $this->popupanchor = $popupanchor;
    }
}
