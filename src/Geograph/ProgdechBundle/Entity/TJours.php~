<?php

namespace Geograph\ProgdechBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TJours
 *
 * @ORM\Table(name="t_jours")
 * @ORM\Entity
 */
class TJours
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_jour", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="t_jours_id_jour_seq", allocationSize=1, initialValue=1)
     */
    private $idJour;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_jour", type="string", length=8, nullable=true)
     */
    private $nomJour;



    /**
     * Get idJour
     *
     * @return integer 
     */
    public function getIdJour()
    {
        return $this->idJour;
    }

    /**
     * Set nomJour
     *
     * @param string $nomJour
     * @return TJours
     */
    public function setNomJour($nomJour)
    {
        $this->nomJour = $nomJour;

        return $this;
    }

    /**
     * Get nomJour
     *
     * @return string 
     */
    public function getNomJour()
    {
        return $this->nomJour;
    }
}
