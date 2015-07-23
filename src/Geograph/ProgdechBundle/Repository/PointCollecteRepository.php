<?php

namespace Geograph\ProgdechBundle\Repository;

use Geograph\ProgdechBundle\Geometrie\Marker;

use Doctrine\ORM\EntityRepository;
use Doctrine\Common\Collections\Collection;

/**
 * PointCollecteRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class PointCollecteRepository extends EntityRepository
{
    /**
     * Assigne un marker à des points de collecte.
     *
     * @param $pointsCollecte \Doctrine\Common\Collections\Collection Les points de collecte.
     * @param $marker Marker Le marker.
     *
     * @return void
     */
    public function assignMarkerToPointsCollecte(Collection $pointsCollecte, Marker $marker)
    {
            foreach($pointsCollecte as $pointCollecte)
                    $pointCollecte->marker = $marker;
    }
    
    
    /**
     * Retourne le nbr de point de collecte pour un type distinct
     * 
     * @return type
     */
    public function getNbrPointCollecteFlux($id_type, $id_commune)
    {
        $query = $this->_em->createQuery('
                SELECT COUNT(distinct pc)
                FROM GeographProgdechBundle:PointCollecte pc
                JOIN pc.bacs b
                JOIN b.modelebac mb
                JOIN mb.typeflux tf
                WHERE tf.id = ?1 AND pc.commune = ?2')
                ->setParameter(1, $id_type)
                ->setParameter(2, $id_commune)
            ;
        
        $result = $query->getResult();
        return $result;
    }
}
