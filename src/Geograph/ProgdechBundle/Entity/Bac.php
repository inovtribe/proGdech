<?php

namespace Geograph\ProgdechBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Bac
 *
 * @ORM\Table(name="t_bacs")
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
    private $reference;

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
     * @ORM\ManyToOne(targetEntity="User")
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
     * Constructor
     */
    public function __construct()
    {
        $this->constats = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return Bac
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
     * Set modeleBac
     *
     * @param \Geograph\ProgdechBundle\Entity\Modelebac $modeleBac
     * @return Bac
     */
    public function setModeleBac(\Geograph\ProgdechBundle\Entity\Modelebac $modeleBac = null)
    {
        $this->modeleBac = $modeleBac;

        return $this;
    }

    /**
     * Get modeleBac
     *
     * @return \Geograph\ProgdechBundle\Entity\Modelebac 
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
