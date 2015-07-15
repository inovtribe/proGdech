<?php

namespace Geograph\ProgdechBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ouverture
 *
 * @ORM\Table(name="t_ouvertures")
 * @ORM\Entity
 */
class Ouverture
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_ouverture", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="t_ouvertures_id_ouverture_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="type_ouverture", type="string", length=20, nullable=true)
     */
    private $type;
    
    /**
     * @ORM\OneToMany(targetEntity="Modelebac", mappedBy="ouverture")
     */
    protected $ouvertures;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->modelesbac = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set type
     *
     * @param string $type
     * @return Ouverture
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Add modelesbac
     *
     * @param \Geograph\ProgdechBundle\Entity\Modelebac $modelesbac
     * @return Ouverture
     */
    public function addModelesbac(\Geograph\ProgdechBundle\Entity\Modelebac $modelesbac)
    {
        $this->modelesbac[] = $modelesbac;

        return $this;
    }

    /**
     * Remove modelesbac
     *
     * @param \Geograph\ProgdechBundle\Entity\Modelebac $modelesbac
     */
    public function removeModelesbac(\Geograph\ProgdechBundle\Entity\Modelebac $modelesbac)
    {
        $this->modelesbac->removeElement($modelesbac);
    }

    /**
     * Get modelesbac
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getModelesbac()
    {
        return $this->modelesbac;
    }
}
