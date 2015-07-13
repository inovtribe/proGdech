<?php

namespace Geograph\ProgdechBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Typefondscarte
 *
 * @ORM\Table(name="t_typesfondscartes")
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="Geograph\ProgdechBundle\Repository\TypefondcarteRepository")
 */
class TypeFondCarte
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_typefondcarte", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="t_typesfondscartes_id_typefondcarte_seq", allocationSize=1, initialValue=1)
     */
    private $id;
    
    /**
     * @var string
     *
     * @ORM\Column(name="nom_typefondcarte", type="string", length=15, nullable=false)
     */
    private $nom;
    
    
    /**
     * @ORM\OneToMany(targetEntity="FondCarte", mappedBy="typefondcarte")
     */
    protected $fondsCarte;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->fondsCarte = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return TypeFondCarte
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
     * Add fondsCarte
     *
     * @param \Geograph\ProgdechBundle\Entity\FondCarte $fondsCarte
     * @return TypeFondCarte
     */
    public function addFondsCarte(\Geograph\ProgdechBundle\Entity\FondCarte $fondsCarte)
    {
        $this->fondsCarte[] = $fondsCarte;

        return $this;
    }

    /**
     * Remove fondsCarte
     *
     * @param \Geograph\ProgdechBundle\Entity\FondCarte $fondsCarte
     */
    public function removeFondsCarte(\Geograph\ProgdechBundle\Entity\FondCarte $fondsCarte)
    {
        $this->fondsCarte->removeElement($fondsCarte);
    }

    /**
     * Get fondsCarte
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getFondsCarte()
    {
        return $this->fondsCarte;
    }
}
