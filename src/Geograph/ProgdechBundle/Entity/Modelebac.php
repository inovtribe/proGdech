<?php

namespace Geograph\ProgdechBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TModelesbacs
 *
 * @ORM\Table(name="t_modelesbacs", indexes={@ORM\Index(name="IDX_EC45CB42F88DC732", columns={"id_format"}), @ORM\Index(name="IDX_EC45CB42C373A28C", columns={"id_ouverture"}), @ORM\Index(name="IDX_EC45CB426DF522B4", columns={"id_typeflux"}), @ORM\Index(name="IDX_EC45CB426B3CA4B", columns={"id_user"})})
 * @ORM\Entity
 */
class Modelebac
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_modelebac", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="t_modelesbacs_id_modelebac_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="ref_modelebac", type="string", length=10, nullable=true)
     */
    private $reference;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_modelebac", type="string", length=50, nullable=true)
     */
    private $nom;

    /**
     * @var integer
     *
     * @ORM\Column(name="type_modelebac", type="integer", nullable=true)
     */
    private $type;

    /**
     * @var integer
     *
     * @ORM\Column(name="volume_modelebac", type="integer", nullable=true)
     */
    private $volume;

    /**
     * @var \Format
     *
     * @ORM\ManyToOne(targetEntity="Format", inversedBy="formats")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_format", referencedColumnName="id_format", onDelete="restrict")
     * })
     */
    private $format;

    /**
     * @var \Ouverture
     *
     * @ORM\ManyToOne(targetEntity="Ouverture", inversedBy="ouvertures")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_ouverture", referencedColumnName="id_ouverture", onDelete="restrict")
     * })
     */
    private $ouverture;

    /**
     * @var \Typeflux
     *
     * @ORM\ManyToOne(targetEntity="Typeflux", inversedBy="modelesbac")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_typeflux", referencedColumnName="id_typeflux", onDelete="restrict")
     * })
     */
    private $typeflux;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User", inversedBy="modelesbac")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_user", referencedColumnName="id_user", onDelete="restrict")
     * })
     */
    private $user;
    
    /**
     * @ORM\OneToMany(targetEntity="Bac", mappedBy="modelebac")
     */
    protected $bacs;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->bacs = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return Modelebac
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
     * Set nom
     *
     * @param string $nom
     * @return Modelebac
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
     * Set type
     *
     * @param integer $type
     * @return Modelebac
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return integer 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set volume
     *
     * @param integer $volume
     * @return Modelebac
     */
    public function setVolume($volume)
    {
        $this->volume = $volume;

        return $this;
    }

    /**
     * Get volume
     *
     * @return integer 
     */
    public function getVolume()
    {
        return $this->volume;
    }

    /**
     * Set format
     *
     * @param \Geograph\ProgdechBundle\Entity\Format $format
     * @return Modelebac
     */
    public function setFormat(\Geograph\ProgdechBundle\Entity\Format $format = null)
    {
        $this->format = $format;

        return $this;
    }

    /**
     * Get format
     *
     * @return \Geograph\ProgdechBundle\Entity\Format 
     */
    public function getFormat()
    {
        return $this->format;
    }

    /**
     * Set ouverture
     *
     * @param \Geograph\ProgdechBundle\Entity\Ouverture $ouverture
     * @return Modelebac
     */
    public function setOuverture(\Geograph\ProgdechBundle\Entity\Ouverture $ouverture = null)
    {
        $this->ouverture = $ouverture;

        return $this;
    }

    /**
     * Get ouverture
     *
     * @return \Geograph\ProgdechBundle\Entity\Ouverture 
     */
    public function getOuverture()
    {
        return $this->ouverture;
    }

    /**
     * Set typeflux
     *
     * @param \Geograph\ProgdechBundle\Entity\Typeflux $typeflux
     * @return Modelebac
     */
    public function setTypeflux(\Geograph\ProgdechBundle\Entity\Typeflux $typeflux = null)
    {
        $this->typeflux = $typeflux;

        return $this;
    }

    /**
     * Get typeflux
     *
     * @return \Geograph\ProgdechBundle\Entity\Typeflux 
     */
    public function getTypeflux()
    {
        return $this->typeflux;
    }

    /**
     * Set user
     *
     * @param \Geograph\ProgdechBundle\Entity\User $user
     * @return Modelebac
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

    /**
     * Add bacs
     *
     * @param \Geograph\ProgdechBundle\Entity\Bac $bacs
     * @return Modelebac
     */
    public function addBac(\Geograph\ProgdechBundle\Entity\Bac $bacs)
    {
        $this->bacs[] = $bacs;

        return $this;
    }

    /**
     * Remove bacs
     *
     * @param \Geograph\ProgdechBundle\Entity\Bac $bacs
     */
    public function removeBac(\Geograph\ProgdechBundle\Entity\Bac $bacs)
    {
        $this->bacs->removeElement($bacs);
    }

    /**
     * Get bacs
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getBacs()
    {
        return $this->bacs;
    }
}
