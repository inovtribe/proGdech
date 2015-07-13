<?php

namespace Geograph\ProgdechBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Donneecollectee
 * 
 * @ORM\Table(name="t_donneescollectes")
 * @ORM\Entity
 */
class Donneecollectee
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_donneecollecte", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="t_donneescollectes_id_donneecollecte_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_donneecollecte", type="date", nullable=true)
     */
    private $date;

    /**
     * @var integer
     *
     * @ORM\Column(name="distance_donneecollecte", type="integer", nullable=true)
     */
    private $distance;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="temps_donneecollecte", type="datetimetz", nullable=true)
     */
    private $temps;

    /**
     * @var integer
     *
     * @ORM\Column(name="poid_donneecollecte", type="integer", nullable=true)
     */
    private $poid;

    /**
     * @var string
     *
     * @ORM\Column(name="observations_donneecollecte", type="string", length=255, nullable=true)
     */
    private $observations;

    /**
     * @var \Tournee
     *
     * @ORM\ManyToOne(targetEntity="Tournee")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_tournee", referencedColumnName="id_tournee", onDelete="restrict")
     * })
     */
    private $idTournee;


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
     * Set date
     *
     * @param \DateTime $date
     * @return Donneecollectee
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set distance
     *
     * @param integer $distance
     * @return Donneecollectee
     */
    public function setDistance($distance)
    {
        $this->distance = $distance;

        return $this;
    }

    /**
     * Get distance
     *
     * @return integer 
     */
    public function getDistance()
    {
        return $this->distance;
    }

    /**
     * Set temps
     *
     * @param \DateTime $temps
     * @return Donneecollectee
     */
    public function setTemps($temps)
    {
        $this->temps = $temps;

        return $this;
    }

    /**
     * Get temps
     *
     * @return \DateTime 
     */
    public function getTemps()
    {
        return $this->temps;
    }

    /**
     * Set poid
     *
     * @param integer $poid
     * @return Donneecollectee
     */
    public function setPoid($poid)
    {
        $this->poid = $poid;

        return $this;
    }

    /**
     * Get poid
     *
     * @return integer 
     */
    public function getPoid()
    {
        return $this->poid;
    }

    /**
     * Set observations
     *
     * @param string $observations
     * @return Donneecollectee
     */
    public function setObservations($observations)
    {
        $this->observations = $observations;

        return $this;
    }

    /**
     * Get observations
     *
     * @return string 
     */
    public function getObservations()
    {
        return $this->observations;
    }

    /**
     * Set idTournee
     *
     * @param \Geograph\ProgdechBundle\Entity\Tournee $idTournee
     * @return Donneecollectee
     */
    public function setIdTournee(\Geograph\ProgdechBundle\Entity\Tournee $idTournee = null)
    {
        $this->idTournee = $idTournee;

        return $this;
    }

    /**
     * Get idTournee
     *
     * @return \Geograph\ProgdechBundle\Entity\Tournee 
     */
    public function getIdTournee()
    {
        return $this->idTournee;
    }
}
