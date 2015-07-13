<?php

namespace Geograph\ProgdechBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TPopulations
 *
 * @ORM\Table(name="t_populations", indexes={@ORM\Index(name="IDX_45302A98FA122EBC", columns={"id_com"})})
 * @ORM\Entity
 */
class TPopulations
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_population", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="t_populations_id_population_seq", allocationSize=1, initialValue=1)
     */
    private $idPopulation;

    /**
     * @var integer
     *
     * @ORM\Column(name="annee_population", type="integer", nullable=true)
     */
    private $anneePopulation;

    /**
     * @var integer
     *
     * @ORM\Column(name="nbre_population", type="integer", nullable=true)
     */
    private $nbrePopulation;

    /**
     * @var \Commune
     *
     * @ORM\ManyToOne(targetEntity="Commune")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_com", referencedColumnName="id_com")
     * })
     */
    private $idCom;



    /**
     * Get idPopulation
     *
     * @return integer 
     */
    public function getIdPopulation()
    {
        return $this->idPopulation;
    }

    /**
     * Set anneePopulation
     *
     * @param integer $anneePopulation
     * @return TPopulations
     */
    public function setAnneePopulation($anneePopulation)
    {
        $this->anneePopulation = $anneePopulation;

        return $this;
    }

    /**
     * Get anneePopulation
     *
     * @return integer 
     */
    public function getAnneePopulation()
    {
        return $this->anneePopulation;
    }

    /**
     * Set nbrePopulation
     *
     * @param integer $nbrePopulation
     * @return TPopulations
     */
    public function setNbrePopulation($nbrePopulation)
    {
        $this->nbrePopulation = $nbrePopulation;

        return $this;
    }

    /**
     * Get nbrePopulation
     *
     * @return integer 
     */
    public function getNbrePopulation()
    {
        return $this->nbrePopulation;
    }

    /**
     * Set idCom
     *
     * @param \Geograph\ProgdechBundle\Entity\Commune $idCom
     * @return TPopulations
     */
    public function setIdCom(\Geograph\ProgdechBundle\Entity\Commune $idCom = null)
    {
        $this->idCom = $idCom;

        return $this;
    }

    /**
     * Get idCom
     *
     * @return \Geograph\ProgdechBundle\Entity\Communes
     */
    public function getIdCom()
    {
        return $this->idCom;
    }
}
