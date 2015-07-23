<?php

namespace Geograph\ProgdechBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TCollectes
 *
 * @ORM\Table(name="t_collectes", indexes={@ORM\Index(name="IDX_C85974A6356BD40E", columns={"id_tournee"}), @ORM\Index(name="IDX_C85974A66B3CA4B", columns={"id_user"})})

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

}
