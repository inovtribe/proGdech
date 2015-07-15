<?php

namespace Geograph\ProgdechBundle\Geometrie;

use Geograph\ProgdechBundle\Geometrie\Carte;

use Doctrine\ORM\EntityManager;

class CarteDAO
{
    public function setMap($div = 'map'){
        $row['div'] = $div;
        $row['latitude'] = 44.129828; // A remplacer par les valeurs du gestionnaire dans la base de données
        $row['longitude'] = 1.228485; // A remplacer par les valeurs du gestionnaire dans la base de données
        $row['zoom'] = 13;

        return $this->buildDomainObject($row);
    }
   
    protected function buildDomainObject($row) {
        $carte = new Carte();
        if (array_key_exists('div', $row)){
            $carte->setDiv($row['div']);
        }
        if (array_key_exists('latitude', $row)){
            $carte->setLatitudeView($row['latitude']);
        }
        if (array_key_exists('longitude', $row)){
            $carte->setLongitudeView($row['longitude']);
        }
        if (array_key_exists('zoom', $row)){
            $carte->setZoom($row['zoom']);
        }
        return $carte;
    }
}