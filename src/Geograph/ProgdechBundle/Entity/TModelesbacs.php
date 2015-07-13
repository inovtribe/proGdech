<?php

namespace Geograph\ProgdechBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TModelesbacs
 *
 * @ORM\Table(name="t_modelesbacs", indexes={@ORM\Index(name="IDX_EC45CB42F88DC732", columns={"id_format"}), @ORM\Index(name="IDX_EC45CB42C373A28C", columns={"id_ouverture"}), @ORM\Index(name="IDX_EC45CB426DF522B4", columns={"id_typeflux"}), @ORM\Index(name="IDX_EC45CB426B3CA4B", columns={"id_user"})})
 * @ORM\Entity
 */
class TModelesbacs
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_modelebac", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="t_modelesbacs_id_modelebac_seq", allocationSize=1, initialValue=1)
     */
    private $idModelebac;

    /**
     * @var string
     *
     * @ORM\Column(name="ref_modelebac", type="string", length=10, nullable=true)
     */
    private $refModelebac;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_modelebac", type="string", length=50, nullable=true)
     */
    private $nomModelebac;

    /**
     * @var integer
     *
     * @ORM\Column(name="type_modelebac", type="integer", nullable=true)
     */
    private $typeModelebac;

    /**
     * @var integer
     *
     * @ORM\Column(name="volume_modelebac", type="integer", nullable=true)
     */
    private $volumeModelebac;

    /**
     * @var \TFormats
     *
     * @ORM\ManyToOne(targetEntity="TFormats")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_format", referencedColumnName="id_format")
     * })
     */
    private $idFormat;

    /**
     * @var \TOuvertures
     *
     * @ORM\ManyToOne(targetEntity="TOuvertures")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_ouverture", referencedColumnName="id_ouverture")
     * })
     */
    private $idOuverture;

    /**
     * @var \TTypeflux
     *
     * @ORM\ManyToOne(targetEntity="TTypeflux")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_typeflux", referencedColumnName="id_typeflux")
     * })
     */
    private $idTypeflux;

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
     * Get idModelebac
     *
     * @return integer 
     */
    public function getIdModelebac()
    {
        return $this->idModelebac;
    }

    /**
     * Set refModelebac
     *
     * @param string $refModelebac
     * @return TModelesbacs
     */
    public function setRefModelebac($refModelebac)
    {
        $this->refModelebac = $refModelebac;

        return $this;
    }

    /**
     * Get refModelebac
     *
     * @return string 
     */
    public function getRefModelebac()
    {
        return $this->refModelebac;
    }

    /**
     * Set nomModelebac
     *
     * @param string $nomModelebac
     * @return TModelesbacs
     */
    public function setNomModelebac($nomModelebac)
    {
        $this->nomModelebac = $nomModelebac;

        return $this;
    }

    /**
     * Get nomModelebac
     *
     * @return string 
     */
    public function getNomModelebac()
    {
        return $this->nomModelebac;
    }

    /**
     * Set typeModelebac
     *
     * @param integer $typeModelebac
     * @return TModelesbacs
     */
    public function setTypeModelebac($typeModelebac)
    {
        $this->typeModelebac = $typeModelebac;

        return $this;
    }

    /**
     * Get typeModelebac
     *
     * @return integer 
     */
    public function getTypeModelebac()
    {
        return $this->typeModelebac;
    }

    /**
     * Set volumeModelebac
     *
     * @param integer $volumeModelebac
     * @return TModelesbacs
     */
    public function setVolumeModelebac($volumeModelebac)
    {
        $this->volumeModelebac = $volumeModelebac;

        return $this;
    }

    /**
     * Get volumeModelebac
     *
     * @return integer 
     */
    public function getVolumeModelebac()
    {
        return $this->volumeModelebac;
    }

    /**
     * Set idFormat
     *
     * @param \Geograph\ProgdechBundle\Entity\TFormats $idFormat
     * @return TModelesbacs
     */
    public function setIdFormat(\Geograph\ProgdechBundle\Entity\TFormats $idFormat = null)
    {
        $this->idFormat = $idFormat;

        return $this;
    }

    /**
     * Get idFormat
     *
     * @return \Geograph\ProgdechBundle\Entity\TFormats 
     */
    public function getIdFormat()
    {
        return $this->idFormat;
    }

    /**
     * Set idOuverture
     *
     * @param \Geograph\ProgdechBundle\Entity\TOuvertures $idOuverture
     * @return TModelesbacs
     */
    public function setIdOuverture(\Geograph\ProgdechBundle\Entity\TOuvertures $idOuverture = null)
    {
        $this->idOuverture = $idOuverture;

        return $this;
    }

    /**
     * Get idOuverture
     *
     * @return \Geograph\ProgdechBundle\Entity\TOuvertures 
     */
    public function getIdOuverture()
    {
        return $this->idOuverture;
    }

    /**
     * Set idTypeflux
     *
     * @param \Geograph\ProgdechBundle\Entity\TTypeflux $idTypeflux
     * @return TModelesbacs
     */
    public function setIdTypeflux(\Geograph\ProgdechBundle\Entity\TTypeflux $idTypeflux = null)
    {
        $this->idTypeflux = $idTypeflux;

        return $this;
    }

    /**
     * Get idTypeflux
     *
     * @return \Geograph\ProgdechBundle\Entity\TTypeflux 
     */
    public function getIdTypeflux()
    {
        return $this->idTypeflux;
    }

    /**
     * Set idUser
     *
     * @param \Geograph\ProgdechBundle\Entity\TUsers $idUser
     * @return TModelesbacs
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
