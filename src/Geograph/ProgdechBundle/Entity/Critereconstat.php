<?php

namespace Geograph\ProgdechBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Critereconstat
 * 
 * @ORM\Table(name="t_critereconstats")
 * @ORM\Entity
 */
class Critereconstat
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_critere", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="t_critereconstats_id_critere_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_critere", type="string", length=50, nullable=false)
     */
    private $nom;
    
    /**
     * @ORM\OneToMany(targetEntity="Constat", mappedBy="critereconstat")
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
     * Set nom
     *
     * @param string $nom
     * @return Critereconstat
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
     * Add constats
     *
     * @param \Geograph\ProgdechBundle\Entity\Constat $constats
     * @return Critereconstat
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
