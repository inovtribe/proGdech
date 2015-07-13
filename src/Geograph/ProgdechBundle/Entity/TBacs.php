<?php

namespace Geograph\ProgdechBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TBacs
 *
 * @ORM\Table(name="t_bacs", indexes={@ORM\Index(name="IDX_C4D43013575A6A8", columns={"id_collecte"}), @ORM\Index(name="IDX_C4D43013562F6245", columns={"id_modelebac"}), @ORM\Index(name="IDX_C4D430132D8A6AB4", columns={"id_ptcollecte"}), @ORM\Index(name="IDX_C4D430136B3CA4B", columns={"id_user"})})
 * @ORM\Entity
 */
class TBacs
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_bac", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="t_bacs_id_bac_seq", allocationSize=1, initialValue=1)
     */
    private $idBac;

    /**
     * @var string
     *
     * @ORM\Column(name="ref_bac", type="string", length=20, nullable=false)
     */
    private $refBac;

    /**
     * @var integer
     *
     * @ORM\Column(name="emplacement_bac", type="integer", nullable=true)
     */
    private $emplacementBac;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_bac", type="date", nullable=true)
     */
    private $dateBac;

    /**
     * @var \TCollectes
     *
     * @ORM\ManyToOne(targetEntity="TCollectes")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_collecte", referencedColumnName="id_collecte")
     * })
     */
    private $idCollecte;

    /**
     * @var \TModelesbacs
     *
     * @ORM\ManyToOne(targetEntity="TModelesbacs")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_modelebac", referencedColumnName="id_modelebac")
     * })
     */
    private $idModelebac;

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
     * Get idBac
     *
     * @return integer 
     */
    public function getIdBac()
    {
        return $this->idBac;
    }

    /**
     * Set refBac
     *
     * @param string $refBac
     * @return TBacs
     */
    public function setRefBac($refBac)
    {
        $this->refBac = $refBac;

        return $this;
    }

    /**
     * Get refBac
     *
     * @return string 
     */
    public function getRefBac()
    {
        return $this->refBac;
    }

    /**
     * Set emplacementBac
     *
     * @param integer $emplacementBac
     * @return TBacs
     */
    public function setEmplacementBac($emplacementBac)
    {
        $this->emplacementBac = $emplacementBac;

        return $this;
    }

    /**
     * Get emplacementBac
     *
     * @return integer 
     */
    public function getEmplacementBac()
    {
        return $this->emplacementBac;
    }

    /**
     * Set dateBac
     *
     * @param \DateTime $dateBac
     * @return TBacs
     */
    public function setDateBac($dateBac)
    {
        $this->dateBac = $dateBac;

        return $this;
    }

    /**
     * Get dateBac
     *
     * @return \DateTime 
     */
    public function getDateBac()
    {
        return $this->dateBac;
    }

    /**
     * Set idCollecte
     *
     * @param \Geograph\ProgdechBundle\Entity\TCollectes $idCollecte
     * @return TBacs
     */
    public function setIdCollecte(\Geograph\ProgdechBundle\Entity\TCollectes $idCollecte = null)
    {
        $this->idCollecte = $idCollecte;

        return $this;
    }

    /**
     * Get idCollecte
     *
     * @return \Geograph\ProgdechBundle\Entity\TCollectes 
     */
    public function getIdCollecte()
    {
        return $this->idCollecte;
    }

    /**
     * Set idModelebac
     *
     * @param \Geograph\ProgdechBundle\Entity\TModelesbacs $idModelebac
     * @return TBacs
     */
    public function setIdModelebac(\Geograph\ProgdechBundle\Entity\TModelesbacs $idModelebac = null)
    {
        $this->idModelebac = $idModelebac;

        return $this;
    }

    /**
     * Get idModelebac
     *
     * @return \Geograph\ProgdechBundle\Entity\TModelesbacs 
     */
    public function getIdModelebac()
    {
        return $this->idModelebac;
    }

    /**
     * Set idPtcollecte
     *
     * @param \Geograph\ProgdechBundle\Entity\PointCollecte $idPtcollecte
     * @return TBacs
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
     * @return TBacs
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
