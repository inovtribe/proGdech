<?php

namespace Geograph\ProgdechBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TCollectes
 *
 * @ORM\Table(name="t_collectes")
 * @ORM\Entity
 * 
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
     * @ORM\ManyToOne(targetEntity="Tournee")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_tournee", referencedColumnName="id_tournee", onDelete="restrict")
     * })
     */
    private $tournee;
    

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
}
