<?php

namespace Geograph\ProgdechBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TObservations
 *
 * @ORM\Table(name="t_observations", indexes={@ORM\Index(name="IDX_CC963A1AA1F72923", columns={"id_critere"}), @ORM\Index(name="IDX_CC963A1A2D8A6AB4", columns={"id_ptcollecte"}), @ORM\Index(name="IDX_CC963A1A6B3CA4B", columns={"id_user"})})
 * @ORM\Entity
 */
class TObservations
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_observation", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="t_observations_id_observation_seq", allocationSize=1, initialValue=1)
     */
    private $idObservation;

    /**
     * @var string
     *
     * @ORM\Column(name="ref_observation", type="string", length=20, nullable=false)
     */
    private $refObservation;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_observation", type="date", nullable=true)
     */
    private $dateObservation;

    /**
     * @var string
     *
     * @ORM\Column(name="content_observation", type="string", length=255, nullable=true)
     */
    private $contentObservation;

    /**
     * @var \TCritereobservations
     *
     * @ORM\ManyToOne(targetEntity="TCritereobservations")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_critere", referencedColumnName="id_critere")
     * })
     */
    private $idCritere;

    /**
     * @var \PointCollecte
     *
     * @ORM\ManyToOne(targetEntity="PointCollecte")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_ptcollecte", referencedColumnName="id_ptcollecte")
     * })
     */
    private $idPtcollecte;

    /**
     * @var \TUsers
     *
     * @ORM\ManyToOne(targetEntity="TUsers")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_user", referencedColumnName="id_user")
     * })
     */
    private $idUser;



    /**
     * Get idObservation
     *
     * @return integer 
     */
    public function getIdObservation()
    {
        return $this->idObservation;
    }

    /**
     * Set refObservation
     *
     * @param string $refObservation
     * @return TObservations
     */
    public function setRefObservation($refObservation)
    {
        $this->refObservation = $refObservation;

        return $this;
    }

    /**
     * Get refObservation
     *
     * @return string 
     */
    public function getRefObservation()
    {
        return $this->refObservation;
    }

    /**
     * Set dateObservation
     *
     * @param \DateTime $dateObservation
     * @return TObservations
     */
    public function setDateObservation($dateObservation)
    {
        $this->dateObservation = $dateObservation;

        return $this;
    }

    /**
     * Get dateObservation
     *
     * @return \DateTime 
     */
    public function getDateObservation()
    {
        return $this->dateObservation;
    }

    /**
     * Set contentObservation
     *
     * @param string $contentObservation
     * @return TObservations
     */
    public function setContentObservation($contentObservation)
    {
        $this->contentObservation = $contentObservation;

        return $this;
    }

    /**
     * Get contentObservation
     *
     * @return string 
     */
    public function getContentObservation()
    {
        return $this->contentObservation;
    }

    /**
     * Set idCritere
     *
     * @param \Geograph\ProgdechBundle\Entity\TCritereobservations $idCritere
     * @return TObservations
     */
    public function setIdCritere(\Geograph\ProgdechBundle\Entity\TCritereobservations $idCritere = null)
    {
        $this->idCritere = $idCritere;

        return $this;
    }

    /**
     * Get idCritere
     *
     * @return \Geograph\ProgdechBundle\Entity\TCritereobservations 
     */
    public function getIdCritere()
    {
        return $this->idCritere;
    }

    /**
     * Set idPtcollecte
     *
     * @param \Geograph\ProgdechBundle\Entity\PointCollecte $idPtcollecte
     * @return TObservations
     */
    public function setIdPtcollecte(\Geograph\ProgdechBundle\Entity\PointCollecte $idPtcollecte = null)
    {
        $this->idPtcollecte = $idPtcollecte;

        return $this;
    }

    /**
     * Get idPtcollecte
     *
     * @return \Geograph\ProgdechBundle\Entity\PointCollecte 
     */
    public function getIdPtcollecte()
    {
        return $this->idPtcollecte;
    }

    /**
     * Set idUser
     *
     * @param \Geograph\ProgdechBundle\Entity\TUsers $idUser
     * @return TObservations
     */
    public function setIdUser(\Geograph\ProgdechBundle\Entity\TUsers $idUser = null)
    {
        $this->idUser = $idUser;

        return $this;
    }

    /**
     * Get idUser
     *
     * @return \Geograph\ProgdechBundle\Entity\TUsers 
     */
    public function getIdUser()
    {
        return $this->idUser;
    }
}
