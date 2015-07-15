<?php

namespace Geograph\ProgdechBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Observation
 *
 * @ORM\Table(name="t_observations", indexes={@ORM\Index(name="IDX_CC963A1AA1F72923", columns={"id_critere"}), @ORM\Index(name="IDX_CC963A1A2D8A6AB4", columns={"id_ptcollecte"}), @ORM\Index(name="IDX_CC963A1A6B3CA4B", columns={"id_user"})})
 * @ORM\Entity
 */
class Observation
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_observation", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="t_observations_id_observation_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="ref_observation", type="string", length=20, nullable=false)
     */
    private $reference;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_observation", type="date", nullable=true)
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="content_observation", type="string", length=255, nullable=true)
     */
    private $content;

    /**
     * @var \Critereobservation
     *
     * @ORM\ManyToOne(targetEntity="Critereobservation", inversedBy="criteresobservation")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_critere", referencedColumnName="id_critere", onDelete="restrict")
     * })
     */
    private $critereobservation;

    /**
     * @var \PointCollecte
     *
     * @ORM\ManyToOne(targetEntity="PointCollecte", inversedBy="observations")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_ptcollecte", referencedColumnName="id_ptcollecte", onDelete="restrict")
     * })
     */
    private $pointcollecte;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User", inversedBy="observations")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_user", referencedColumnName="id_user", onDelete="restrict")
     * })
     */
    private $user;



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
     * Set reference
     *
     * @param string $reference
     * @return Observation
     */
    public function setReference($reference)
    {
        $this->reference = $reference;

        return $this;
    }

    /**
     * Get reference
     *
     * @return string 
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return Observation
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
     * Set content
     *
     * @param string $content
     * @return Observation
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string 
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set critere
     *
     * @param \Geograph\ProgdechBundle\Entity\Critereobservation $critere
     * @return Observation
     */
    public function setCritere(\Geograph\ProgdechBundle\Entity\Critereobservation $critere = null)
    {
        $this->critere = $critere;

        return $this;
    }

    /**
     * Get critere
     *
     * @return \Geograph\ProgdechBundle\Entity\Critereobservation 
     */
    public function getCritere()
    {
        return $this->critere;
    }

    /**
     * Set pointcollecte
     *
     * @param \Geograph\ProgdechBundle\Entity\PointCollecte $pointcollecte
     * @return Observation
     */
    public function setPointcollecte(\Geograph\ProgdechBundle\Entity\PointCollecte $pointcollecte = null)
    {
        $this->pointcollecte = $pointcollecte;

        return $this;
    }

    /**
     * Get pointcollecte
     *
     * @return \Geograph\ProgdechBundle\Entity\PointCollecte 
     */
    public function getPointcollecte()
    {
        return $this->pointcollecte;
    }

    /**
     * Set user
     *
     * @param \Geograph\ProgdechBundle\Entity\User $user
     * @return Observation
     */
    public function setUser(\Geograph\ProgdechBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \Geograph\ProgdechBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }
}
