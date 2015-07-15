<?php

namespace Geograph\ProgdechBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Constat
 *
 * @ORM\Table(name="t_constats", indexes={@ORM\Index(name="IDX_31C2A6FA82EB4402", columns={"id_bac"}), @ORM\Index(name="IDX_31C2A6FAA1F72923", columns={"id_critere"}), @ORM\Index(name="IDX_31C2A6FA6B3CA4B", columns={"id_user"})})
 * @ORM\Entity
 */
class Constat
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_constat", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="t_constats_id_constat_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_constat", type="date", nullable=true)
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="ref_constat", type="string", length=20, nullable=false)
     */
    private $reference;

    /**
     * @var string
     *
     * @ORM\Column(name="content_constat", type="string", length=255, nullable=true)
     */
    private $content;

    /**
     * @var \Bac
     *
     * @ORM\ManyToOne(targetEntity="Bac")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_bac", referencedColumnName="id_bac", onDelete="restrict")
     * })
     */
    private $bac;

    /**
     * @var \Critereconstat
     *
     * @ORM\ManyToOne(targetEntity="Critereconstat")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_critere", referencedColumnName="id_critere", onDelete="restrict")
     * })
     */
    private $idCritere;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User", inversedBy="constats")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_user", referencedColumnName="id_user", onDelete="restrict")
     * })
     */
    private $user;


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
     * @return Constat
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
     * Set reference
     *
     * @param string $reference
     * @return Constat
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
     * Set content
     *
     * @param string $content
     * @return Constat
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
     * Set bac
     *
     * @param \Geograph\ProgdechBundle\Entity\Bac $bac
     * @return Constat
     */
    public function setBac(\Geograph\ProgdechBundle\Entity\Bac $bac = null)
    {
        $this->bac = $bac;

        return $this;
    }

    /**
     * Get bac
     *
     * @return \Geograph\ProgdechBundle\Entity\Bac 
     */
    public function getBac()
    {
        return $this->bac;
    }

    /**
     * Set idCritere
     *
     * @param \Geograph\ProgdechBundle\Entity\Critereconstat $idCritere
     * @return Constat
     */
    public function setIdCritere(\Geograph\ProgdechBundle\Entity\Critereconstat $idCritere = null)
    {
        $this->idCritere = $idCritere;

        return $this;
    }

    /**
     * Get idCritere
     *
     * @return \Geograph\ProgdechBundle\Entity\Critereconstat 
     */
    public function getIdCritere()
    {
        return $this->idCritere;
    }

    /**
     * Set user
     *
     * @param \Geograph\ProgdechBundle\Entity\User $user
     * @return Constat
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
