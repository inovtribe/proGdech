<?php
// src/Geograph/ProgdechBundle/Progdech/Progdech.php

namespace Geograph\ProgdechBundle\Progdech;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class Progdech
{
    protected $em;

    public function __construct(\Doctrine\ORM\EntityManager $em)
    {
        $this->em = $em;
    }
    
    
    // Affectations d'atributs à un objet commune
    public function setCommune($commune) {
        
        // Population actuelle connue de la commune
        $commune->setPopulationActuelle($this->getPopulationActuelle($commune->getPopulations()));
        // Nombre de points de collecte pour la commune
        $commune->setNombrePointsCollecte($this->getNbrPointsCollecteCommune($commune));
        // Nombre de bacs pour la commune
        $commune->setNombreBacs($this->getNbrBacsPointsCollecte($commune->getPointscollecte()));
        $commune->setSuperficie($this->setSuperficie($commune));
        // Densité pour la commune
        $commune->setDensite($this->setDensiteCommune($commune));
        
        // Les types de bacs
        $repository = $this->em
                ->getRepository('GeographProgdechBundle:Typeflux')
            ;
        $types = $repository->getTypeFluxDistinctCommune($commune->getId());
        $commune->setTypeBacs($types);

        foreach ($types as $type){

            // Nombre de points de collecte de type $type et pour la commune $commune
            $repository = $this->em
                    ->getRepository('GeographProgdechBundle:PointCollecte')
                ;
            $result = $repository->getNbrPointCollecteFlux($type->getId(), $commune->getId());
            $nbr = $result[0][1];
            $type->setNbrPointsCollecte($nbr);

            // Nombre de bacs de type $type et pour la commune $commune
            $repository = $this->em
                    ->getRepository('GeographProgdechBundle:Bac')
                ;
            $result = $repository->getNbrBacFlux($type->getId(), $commune->getId());
            $nbr = $result[0][1];
            $type->setNbrBacs($nbr);
        }
    }
    
    
    public function setCommunes($communes) {
        
        // Définir chaque commune
        foreach ($communes as $commune)
        {
            $this->setCommune($commune);
        }
        
    }
    
    // Affectations d'atributs à un objet pointcollecte
    public function setPointCollecte($pointcollecte){
        
        // Nombre de bacs pour le point d'apport
        $pointcollecte->setEmplacementsAffectes($this->getNbrBacsPointCollecte($pointcollecte));
    }
    
    // Retourne le nombre de point de collecte par commune
    public function getNbrPointsCollecteCommune($commune){
        $pointscollectes = $commune->getPointsCollecte();
        
        return count($pointscollectes);
    }
    
    // Retourne le nombre de bac par point de collecte
    public function getNbrBacsPointCollecte($pointcollecte){
        $bacs = $pointcollecte->getBacs();
        
        return count($bacs);
    }
    
    // Retourne le nombre de bacs pour un ensemble de points de collecte
    public function getNbrBacsPointsCollecte($pointscollecte){
        $nbrbacspointscollecte = 0;
        foreach ($pointscollecte as $pointcollecte)
        {
            $nbrbacspointcollecte = $this->getNbrBacsPointCollecte($pointcollecte);
            $nbrbacspointscollecte += $nbrbacspointcollecte;
            
        }
        
        return $nbrbacspointscollecte;
    }
    
    
    // Retourne la population pour l'année la plus recente
    public function getPopulationActuelle($populations){
        $derniere_statistique = 0;
        foreach ($populations as $population){
            $annee = $population->getAnnee();
            if ($annee > $derniere_statistique){
                $derniere_statistique = $annee;
                $derniere_population = $population->getNbre();
            }
        }
        return $derniere_population;
    }
    
    // Retourne la superficie d'une commune en km²
    public function setSuperficie($commune){
        return ($commune->getSuperficie() / 1000);
    }
    
    // Retourne la densité d'une commune
    public function setDensiteCommune($commune){
        return $densite = number_format($commune->getPopulationActuelle() / ($commune->getSuperficie()),2);
    }
    
    // Retourne la liste des types de bacs
    public function getTypeBacs(){
        
    }
    
}