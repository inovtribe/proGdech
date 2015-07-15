<?php

namespace Geograph\ProgdechBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Bac
 *
 * @ORM\Table(name="t_bacs", indexes={@ORM\Index(name="IDX_C4D43013575A6A8", columns={"id_collecte"}), @ORM\Index(name="IDX_C4D43013562F6245", columns={"id_modelebac"}), @ORM\Index(name="IDX_C4D430132D8A6AB4", columns={"id_ptcollecte"}), @ORM\Index(name="IDX_C4D430136B3CA4B", columns={"id_user"})})
 * @ORM\Entity
 */
class Bac
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_bac", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="t_bacs_id_bac_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="ref_bac", type="string", length=20, nullable=false)
     */
    private $ref;

    /**
     * @var integer
     *
     * @ORM\Column(name="emplacement_bac", type="integer", nullable=true)
     */
    private $emplacement;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_bac", type="date", nullable=true)
     */
    private $date;

    /**
     * @var \Collecte
     *
     * @ORM\ManyToOne(targetEntity="Collecte")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_collecte", referencedColumnName="id_collecte", onDelete="restrict")
     * })
     */
    private $collecte;

    /**
     * @var \Modelebac
     * @ORM\ManyToOne(targetEntity="Modelebac")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_modelebac", referencedColumnName="id_modelebac", onDelete="restrict")
     * })
     */
    private $modeleBac;

    /**
     * @var \PointCollecte
     *
     * @ORM\ManyToOne(targetEntity="PointCollecte")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_ptcollecte", referencedColumnName="id_ptcollecte")
     * })
     */
    private $pointCollecte;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User", inversedBy="bacs")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_user", referencedColumnName="id_user", onDelete="restrict")
     * })
     */
    private $user;
    
    /**
     * @ORM\OneToMany(targetEntity="Constat", mappedBy="bac")
     */
    protected $constats;


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
     * Set ref
     *
     * @param string $ref
     * @return Bac
     */
    public function setRef($ref)
    {
        $this->ref = $ref;

        return $this;
    }

    /**
     * Get ref
     *
     * @return string 
     */
    public function getRef()
    {
        return $this->ref;
    }

    /**
     * Set emplacement
     *
     * @param integer $emplacement
     * @return Bac
     */
    public function setEmplacement($emplacement)
    {
        $this->emplacement = $emplacement;

        return $this;
    }

    /**
     * Get emplacement
     *
     * @return integer 
     */
    public function getEmplacement()
    {
        return $this->emplacement;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return Bac
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
     * Set collecte
     *
     * @param \Geograph\ProgdechBundle\Entity\Collecte $collecte
     * @return Bac
     */
    public function setCollecte(\Geograph\ProgdechBundle\Entity\Collecte $collecte = null)
    {
        $this->collecte = $collecte;

        return $this;
    }

    /**
     * Get collecte
     *
     * @return \Geograph\ProgdechBundle\Entity\Collecte 
     */
    public function getCollecte()
    {
        return $this->collecte;
    }

    /**
     * Set modeleBac
     *
     * @param \Geograph\ProgdechBundle\Entity\ModeleBac $modeleBac
     * @return Bac
     */
    public function setModeleBac(\Geograph\ProgdechBundle\Entity\ModeleBac $modeleBac = null)
    {
        $this->modeleBac = $modeleBac;

        return $this;
    }

    /**
     * Get modeleBac
     *
     * @return \Geograph\ProgdechBundle\Entity\ModeleBac 
     */
    public function getModeleBac()
    {
        return $this->modeleBac;
    }

    /**
     * Set pointCollecte
     *
     * @param \Geograph\ProgdechBundle\Entity\PointCollecte $pointCollecte
     * @return Bac
     */
    public function setPointCollecte(\Geograph\ProgdechBundle\Entity\PointCollecte $pointCollecte = null)
    {
        $this->pointCollecte = $pointCollecte;

        return $this;
    }

    /**
     * Get pointCollecte
     *
     * @return \Geograph\ProgdechBundle\Entity\PointCollecte 
     */
    public function getPointCollecte()
    {
        return $this->pointCollecte;
    }

    /**
     * Set user
     *
     * @param \Geograph\ProgdechBundle\Entity\User $user
     * @return Bac
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
     * Constructor
     */
    public function __construct()
    {
        $this->constats = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add constats
     *
     * @param \Geograph\ProgdechBundle\Entity\Constat $constats
     * @return Bac
     */
    public function addConstat(\Geograph\ProgdechBundle\Entity\Constat $constats)
    {
        $this->constats[] = $constats;

        return $this;
    }

    /**
     * Remove constats
     *
     * @param \Geograph\ProgdechBundle\Entity\Constat $constats
     */
    public function removeConstat(\Geograph\ProgdechBundle\Entity\Constat $constats)
    {
        $this->constats->removeElement($constats);
    }

    /**
     * Get constats
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getConstats()
    {
        return $this->constats;
    }
}
