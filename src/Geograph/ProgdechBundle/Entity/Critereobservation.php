<?php

namespace Geograph\ProgdechBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Critereobservation
 *
 * @ORM\Table(name="t_critereobservations", uniqueConstraints={@ORM\UniqueConstraint(name="_t_criteres_nom_critere_key", columns={"nom_critere"})})
 * @ORM\Entity
 */
class Critereobservation
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_critere", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="t_critereobservations_id_critere_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_critere", type="string", length=50, nullable=false)
     */
    private $nom;
    
    /**
     * @ORM\OneToMany(targetEntity="Observation", mappedBy="critereobservation")
     */
    protected $observations;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->observations = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nom
     *
     * @param string $nom
     * @return Critereobservation
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string 
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Add observations
     *
     * @param \Geograph\ProgdechBundle\Entity\Observation $observations
     * @return Critereobservation
     */
    public function addObservation(\Geograph\ProgdechBundle\Entity\Observation $observations)
    {
        $this->observations[] = $observations;

        return $this;
    }

    /**
     * Remove observations
     *
     * @param \Geograph\ProgdechBundle\Entity\Observation $observations
     */
    public function removeObservation(\Geograph\ProgdechBundle\Entity\Observation $observations)
    {
        $this->observations->removeElement($observations);
    }

    /**
     * Get observations
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getObservations()
    {
        return $this->observations;
    }
}
