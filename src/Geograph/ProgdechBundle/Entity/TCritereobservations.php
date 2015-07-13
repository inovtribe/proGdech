<?php

namespace Geograph\ProgdechBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TCritereobservations
 *
 * @ORM\Table(name="t_critereobservations", uniqueConstraints={@ORM\UniqueConstraint(name="_t_criteres_nom_critere_key", columns={"nom_critere"})})
 * @ORM\Entity
 */
class TCritereobservations
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_critere", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="t_critereobservations_id_critere_seq", allocationSize=1, initialValue=1)
     */
    private $idCritere;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_critere", type="string", length=50, nullable=false)
     */
    private $nomCritere;



    /**
     * Get idCritere
     *
     * @return integer 
     */
    public function getIdCritere()
    {
        return $this->idCritere;
    }

    /**
     * Set nomCritere
     *
     * @param string $nomCritere
     * @return TCritereobservations
     */
    public function setNomCritere($nomCritere)
    {
        $this->nomCritere = $nomCritere;

        return $this;
    }

    /**
     * Get nomCritere
     *
     * @return string 
     */
    public function getNomCritere()
    {
        return $this->nomCritere;
    }
}
