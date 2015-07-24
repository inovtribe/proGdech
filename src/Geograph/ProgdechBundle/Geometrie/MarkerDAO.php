<?php

namespace Geograph\ProgdechBundle\Geometrie;

use Geograph\ProgdechBundle\Geometrie\Marker;

use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\EntityManager;

class MarkerDAO
{
    // Dossier app de l'application.
    var $root_dir;

    // Entity Manager.
    var $em;

    /**
     * Constructeur.
     * Le paramètre est envoyé par la configuration du service (voir fichier app/config/services.yml)
     *
     * @param root_dir string Dossier app de l'application
     **/
    public function __construct($root_dir, EntityManager $em)
    {
        $this->root_dir = $root_dir;
        $this->em = $em;
    }

    /**
     * Défini un object marker en fonction de son type
     * 
     * @param type integer (voir Marker::TYPE_DEFAULT etc.)
     * @param actif boolean True pour un marker actif, false sinon.
     */
    public function createMarker($type, $actif = true){
        return new Marker($type, $actif, $this->root_dir);
    }    
    
    /**
     * Assigne un marker à des points de collecte.
     *
     * @param $pointsCollecte \Doctrine\Common\Collections\Collection Les points de collecte.
     *
     * @return void
     */
    public function assignMarkerToPointsCollecte(Collection $pointsCollecte)
    {
	    //$marker = $this->createMarker(Marker::TYPE_POINT_COLLECTE, false);
	    //$markerVolontaire = $this->createMarker(Marker::TYPE_VOLONTAIRE, false);
            
	    // Positionne l'attribut isVolontaire des points de collecte.
	    $this->em
		    ->getRepository('GeographProgdechBundle:PointCollecte')
		    ->setVolontaires($pointsCollecte);

	    // Assigne le marker à chaque point de collecte.
	    foreach($pointsCollecte as $pointCollecte)
                $pointCollecte->marker = $pointCollecte->getVolontaire()
                        ? $this->createMarker(Marker::TYPE_VOLONTAIRE, false)
                        : $this->createMarker(Marker::TYPE_POINT_COLLECTE, false);
    }
}
