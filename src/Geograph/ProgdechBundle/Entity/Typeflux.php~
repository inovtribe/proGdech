<?php

namespace Geograph\ProgdechBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Typeflux
 *
 * @ORM\Table(name="t_typeflux")
 * @ORM\Entity 
 * @ORM\Entity(repositoryClass="Geograph\ProgdechBundle\Repository\TypefluxRepository")
 */
class Typeflux
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_typeflux", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="t_typeflux_id_typeflux_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_typeflux", type="string", length=50, nullable=true)
     */
    private $nom;

    /**
     * @var boolean
     *
     * @ORM\Column(name="volontaire_typeflux", type="boolean", nullable=true)
     */
    private $volontaire;
    
    /**
     *
     * @var string
     *
     * @ORM\Column(name="color_typeflux", type="string", nullable=true) 
     */
    private $color;
    
    /**
     * @ORM\OneToMany(targetEntity="Modelebac", mappedBy="typeflux")
     */
    protected $modelesbac;
    
    private $nbr_pointscollecte;
    
    private $nbr_bacs;
    
    
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
     * Set nom
     *
     * @param string $nom
     * @return Typeflux
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
     * Set volontaire
     *
     * @param boolean $volontaire
     * @return Typeflux
     */
    public function setVolontaire($volontaire)
    {
        $this->volontaire = $volontaire;

        return $this;
    }

    /**
     * Get volontaire
     *
     * @return boolean 
     */
    public function getVolontaire()
    {
        return $this->volontaire;
    }

    /**
     * Add modelesbac
     *
     * @param \Geograph\ProgdechBundle\Entity\Modelebac $modelesbac
     * @return Typeflux
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
    
    public function getColor(){
        return $this->color;
    }
    public function setColor($color){
        $this->color = $color;
    }  
    
    public function getNbrPointsCollecte(){
        return $this->nbr_pointscollecte;
    }
    public function setNbrPointsCollecte($nbr){
        $this->nbr_pointscollecte = $nbr;
    }
    
    public function getNbrBacs(){
        return $this->nbr_bacs;
    }
    public function setNbrBacs($nbr){
        $this->nbr_bacs = $nbr;
    }
}
