<?php

namespace Geograph\ProgdechBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TCritereconstats
 *
 * @ORM\Table(name="t_critereconstats", uniqueConstraints={@ORM\UniqueConstraint(name="t_criteres_nom_critere_key", columns={"nom_critere"})})
 * @ORM\Entity
 */
class TCritereconstats
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_critere", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="t_critereconstats_id_critere_seq", allocationSize=1, initialValue=1)
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
     * @return TCritereconstats
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
