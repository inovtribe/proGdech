<?php

namespace Geograph\ProgdechBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tournee
 *
 * @ORM\Table(name="t_tournees", indexes={@ORM\Index(name="IDX_78B979175137C5C7", columns={"id_jour"}), @ORM\Index(name="IDX_78B979176B3CA4B", columns={"id_user"})})
 * @ORM\Entity
 */
class Tournee
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_tournee", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="t_tournees_id_tournee_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="ref_tournee", type="string", length=20, nullable=false)
     */
    private $reference;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_tournee", type="string", length=50, nullable=true)
     */
    private $nom;

    /**
     * @var \Jour
     *
     * @ORM\ManyToOne(targetEntity="Jour")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_jour", referencedColumnName="id_jour", onDelete="restrict")
     * })
     */
    private $jour;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User", inversedBy="tournees")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_user", referencedColumnName="id_user", onDelete="restrict")
     * })
     */
    private $user;
    
    /**
     * @ORM\OneToMany(targetEntity="Collecte", mappedBy="tournee")
     */
    protected $collectes;
    
    /**
     * @ORM\OneToMany(targetEntity="Donneecollectee", mappedBy="tournee")
     */
    protected $donneescollectees;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->collectes = new \Doctrine\Common\Collections\ArrayCollection();
        $this->donneescollectees = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return Tournee
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
     * @return Tournee
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
     * Set jour
     *
     * @param \Geograph\ProgdechBundle\Entity\Jour $jour
     * @return Tournee
     */
    public function setJour(\Geograph\ProgdechBundle\Entity\Jour $jour = null)
    {
        $this->jour = $jour;

        return $this;
    }

    /**
     * Get jour
     *
     * @return \Geograph\ProgdechBundle\Entity\Jour 
     */
    public function getJour()
    {
        return $this->jour;
    }

    /**
     * Set user
     *
     * @param \Geograph\ProgdechBundle\Entity\User $user
     * @return Tournee
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
     * Add collectes
     *
     * @param \Geograph\ProgdechBundle\Entity\Collecte $collectes
     * @return Tournee
     */
    public function addCollecte(\Geograph\ProgdechBundle\Entity\Collecte $collectes)
    {
        $this->collectes[] = $collectes;

        return $this;
    }

    /**
     * Remove collectes
     *
     * @param \Geograph\ProgdechBundle\Entity\Collecte $collectes
     */
    public function removeCollecte(\Geograph\ProgdechBundle\Entity\Collecte $collectes)
    {
        $this->collectes->removeElement($collectes);
    }

    /**
     * Get collectes
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCollectes()
    {
        return $this->collectes;
    }

    /**
     * Add donneescollectees
     *
     * @param \Geograph\ProgdechBundle\Entity\Donneecollectee $donneescollectees
     * @return Tournee
     */
    public function addDonneescollectee(\Geograph\ProgdechBundle\Entity\Donneecollectee $donneescollectees)
    {
        $this->donneescollectees[] = $donneescollectees;

        return $this;
    }

    /**
     * Remove donneescollectees
     *
     * @param \Geograph\ProgdechBundle\Entity\Donneecollectee $donneescollectees
     */
    public function removeDonneescollectee(\Geograph\ProgdechBundle\Entity\Donneecollectee $donneescollectees)
    {
        $this->donneescollectees->removeElement($donneescollectees);
    }

    /**
     * Get donneescollectees
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getDonneescollectees()
    {
        return $this->donneescollectees;
    }
}
