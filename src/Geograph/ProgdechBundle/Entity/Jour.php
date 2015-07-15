<?php

namespace Geograph\ProgdechBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Jour
 *
 * @ORM\Table(name="t_jours")
 * @ORM\Entity
 */
class Jour
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_jour", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="t_jours_id_jour_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_jour", type="string", length=8, nullable=true)
     */
    private $nom;
    
    /**
     * @ORM\OneToMany(targetEntity="Tournee", mappedBy="jour")
     */
    protected $tournees;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->tournees = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return Jour
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
     * Add tournees
     *
     * @param \Geograph\ProgdechBundle\Entity\Tournee $tournees
     * @return Jour
     */
    public function addTournee(\Geograph\ProgdechBundle\Entity\Tournee $tournees)
    {
        $this->tournees[] = $tournees;

        return $this;
    }

    /**
     * Remove tournees
     *
     * @param \Geograph\ProgdechBundle\Entity\Tournee $tournees
     */
    public function removeTournee(\Geograph\ProgdechBundle\Entity\Tournee $tournees)
    {
        $this->tournees->removeElement($tournees);
    }

    /**
     * Get tournees
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTournees()
    {
        return $this->tournees;
    }
}
