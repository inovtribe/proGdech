<?php

namespace Geograph\ProgdechBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TConstats
 *
 * @ORM\Table(name="t_constats", indexes={@ORM\Index(name="IDX_31C2A6FA82EB4402", columns={"id_bac"}), @ORM\Index(name="IDX_31C2A6FAA1F72923", columns={"id_critere"}), @ORM\Index(name="IDX_31C2A6FA6B3CA4B", columns={"id_user"})})
 * @ORM\Entity
 */
class TConstats
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_constat", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="t_constats_id_constat_seq", allocationSize=1, initialValue=1)
     */
    private $idConstat;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_constat", type="date", nullable=true)
     */
    private $dateConstat;

    /**
     * @var string
     *
     * @ORM\Column(name="ref_constat", type="string", length=20, nullable=false)
     */
    private $refConstat;

    /**
     * @var string
     *
     * @ORM\Column(name="content_constat", type="string", length=255, nullable=true)
     */
    private $contentConstat;

    /**
     * @var \TBacs
     *
     * @ORM\ManyToOne(targetEntity="TBacs")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_bac", referencedColumnName="id_bac")
     * })
     */
    private $idBac;

    /**
     * @var \TCritereconstats
     *
     * @ORM\ManyToOne(targetEntity="TCritereconstats")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_critere", referencedColumnName="id_critere")
     * })
     */
    private $idCritere;

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
     * Get idConstat
     *
     * @return integer 
     */
    public function getIdConstat()
    {
        return $this->idConstat;
    }

    /**
     * Set dateConstat
     *
     * @param \DateTime $dateConstat
     * @return TConstats
     */
    public function setDateConstat($dateConstat)
    {
        $this->dateConstat = $dateConstat;

        return $this;
    }

    /**
     * Get dateConstat
     *
     * @return \DateTime 
     */
    public function getDateConstat()
    {
        return $this->dateConstat;
    }

    /**
     * Set refConstat
     *
     * @param string $refConstat
     * @return TConstats
     */
    public function setRefConstat($refConstat)
    {
        $this->refConstat = $refConstat;

        return $this;
    }

    /**
     * Get refConstat
     *
     * @return string 
     */
    public function getRefConstat()
    {
        return $this->refConstat;
    }

    /**
     * Set contentConstat
     *
     * @param string $contentConstat
     * @return TConstats
     */
    public function setContentConstat($contentConstat)
    {
        $this->contentConstat = $contentConstat;

        return $this;
    }

    /**
     * Get contentConstat
     *
     * @return string 
     */
    public function getContentConstat()
    {
        return $this->contentConstat;
    }

    /**
     * Set idBac
     *
     * @param \Geograph\ProgdechBundle\Entity\TBacs $idBac
     * @return TConstats
     */
    public function setIdBac(\Geograph\ProgdechBundle\Entity\TBacs $idBac = null)
    {
        $this->idBac = $idBac;

        return $this;
    }

    /**
     * Get idBac
     *
     * @return \Geograph\ProgdechBundle\Entity\TBacs 
     */
    public function getIdBac()
    {
        return $this->idBac;
    }

    /**
     * Set idCritere
     *
     * @param \Geograph\ProgdechBundle\Entity\TCritereconstats $idCritere
     * @return TConstats
     */
    public function setIdCritere(\Geograph\ProgdechBundle\Entity\TCritereconstats $idCritere = null)
    {
        $this->idCritere = $idCritere;

        return $this;
    }

    /**
     * Get idCritere
     *
     * @return \Geograph\ProgdechBundle\Entity\TCritereconstats 
     */
    public function getIdCritere()
    {
        return $this->idCritere;
    }

    /**
     * Set idUser
     *
     * @param \Geograph\ProgdechBundle\Entity\TUsers $idUser
     * @return TConstats
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
