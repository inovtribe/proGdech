<?php
// src/Geograph/ProgdechBundle/Progdech/Progdech.php

namespace Geograph\ProgdechBundle\Progdech;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class Progdech
{  
    public function setCommune($commune) {
        
        // Nombre de points de collecte pour la commune
        $commune->setPopulationActuelle($this->getPopulationActuelle($commune->getPopulations()));
        
        $commune->setNombrePointsCollecte($this->getNbrPointsCollecteCommune($commune));
        $commune->setNombreBacs($this->getNbrBacsPointsCollecte($commune->getPointscollecte()));
    }
    
    public function setCommunes($communes) {
        
        // Définir chaque commune
        foreach ($communes as $commune)
        {
            $this->setCommune($commune);
        }
        
    }
    
    public function getNbrPointsCollecteCommune($commune){
        $pointscollectes = $commune->getPointsCollecte();
        
        return count($pointscollectes);
    }
    
    public function getNbrBacsPointCollecte($pointcollecte){
        $bacs = $pointcollecte->getBacs();
        
        return count($bacs);
    }
    
    public function getNbrBacsPointsCollecte($pointscollecte){
        $nbrbacspointscollecte = 0;
        foreach ($pointscollecte as $pointcollecte)
        {
            $nbrbacspointcollecte = $this->getNbrBacsPointCollecte($pointcollecte);
            $nbrbacspointscollecte += $nbrbacspointcollecte;
        }
        
        return $nbrbacspointscollecte;
    }
    
    public function getPopulationActuelle($populations){
        $derniere_statistique = 0;
        foreach ($populations as $population){
            $annee = $population->getAnnee();
            if ($annee > $derniere_statistique){
                $derniere_statistique = $annee;
            }
        }  
    }
}