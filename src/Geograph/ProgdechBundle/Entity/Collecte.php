<?php

namespace Geograph\ProgdechBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TCollectes
 *
 * @ORM\Table(name="t_collectes", indexes={@ORM\Index(name="IDX_C85974A682EB4402", columns={"id_bac"}), @ORM\Index(name="IDX_C85974A6356BD40E", columns={"id_tournee"}), @ORM\Index(name="IDX_C85974A66B3CA4B", columns={"id_user"})})

 * @ORM\Entity
 */
class Collecte
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_collecte", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="t_collectes_id_collecte_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="position_collecte", type="integer", nullable=false)
     */
    private $position;
   
    /**
     * @ORM\OneToMany(targetEntity="Bac", mappedBy="collecte")
     */
    protected $bacs;

    /**
     * @var \Tournee
     *
     * @ORM\ManyToOne(targetEntity="Tournee", inversedBy="collectes")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_tournee", referencedColumnName="id_tournee", onDelete="restrict")
     * })
     */
    private $tournee;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User", inversedBy="collectes")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_user", referencedColumnName="id_user", onDelete="restrict")
     * })
     */
    private $user;
    
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
     * Set position
     *
     * @param integer $position
     * @return Collecte
     */
    public function setPosition($position)
    {
        $this->position = $position;

        return $this;
    }

    /**
     * Get position
     *
     * @return integer 
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * Add bacs
     *
     * @param \Geograph\ProgdechBundle\Entity\Bac $bacs
     * @return Collecte
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

    /**
     * Set tournee
     *
     * @param \Geograph\ProgdechBundle\Entity\Tournee $tournee
     * @return Collecte
     */
    public function setTournee(\Geograph\ProgdechBundle\Entity\Tournee $tournee = null)
    {
        $this->tournee = $tournee;

        return $this;
    }

    /**
     * Get tournee
     *
     * @return \Geograph\ProgdechBundle\Entity\Tournee 
     */
    public function getTournee()
    {
        return $this->tournee;
    }

    /**
     * Set user
     *
     * @param \Geograph\ProgdechBundle\Entity\User $user
     * @return Collecte
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
     * Set bac
     *
     * @param \Geograph\ProgdechBundle\Entity\Bac $bac
     * @return Collecte
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
}
