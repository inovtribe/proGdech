<?php

namespace Geograph\ProgdechBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Commune
 *
 * @ORM\Table(name="t_communes")
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="Geograph\ProgdechBundle\Repository\CommuneRepository")
 */
class Commune
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_com", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="t_communes_id_com_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_com", type="string", length=50, nullable=false)
     */
    private $nom;

    /**
     * @var integer
     *
     * @ORM\Column(name="cp_com", type="integer", nullable=false)
     */
    private $cp;

    /**
     * @var integer
     *
     * @ORM\Column(name="insee_com", type="integer", nullable=false)
     */
    private $insee;

    /**
     * @var float
     *
     * @ORM\Column(name="superficie_com", type="float", precision=10, scale=0, nullable=false)
     */
    private $superficie;

    /**
     * @var string
     *
     * @ORM\Column(name="geom_com", type="text", nullable=true)
     */
    private $geom;

    /**
     * @ORM\OneToMany(targetEntity="PointCollecte", mappedBy="commune")
     */
    protected $pointsCollecte;

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
     * @return Commune
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
     * Set cp
     *
     * @param integer $cp
     * @return Commune
     */
    public function setCp($cp)
    {
        $this->cp = $cp;

        return $this;
    }

    /**
     * Get cp
     *
     * @return integer 
     */
    public function getCp()
    {
        return $this->cp;
    }

    /**
     * Set insee
     *
     * @param integer $insee
     * @return Commune
     */
    public function setInsee($insee)
    {
        $this->insee = $insee;

        return $this;
    }

    /**
     * Get insee
     *
     * @return integer 
     */
    public function getInsee()
    {
        return $this->insee;
    }

    /**
     * Set superficie
     *
     * @param float $superficie
     * @return Commune
     */
    public function setSuperficie($superficie)
    {
        $this->superficie = $superficie;

        return $this;
    }

    /**
     * Get superficie
     *
     * @return float 
     */
    public function getSuperficie()
    {
        return $this->superficie;
    }

    /**
     * Set geom
     *
     * @param string $geom
     * @return Commune
     */
    public function setGeom($geom)
    {
        $this->geom = $geom;

        return $this;
    }

    /**
     * Get geom
     *
     * @return string 
     */
    public function getGeom()
    {
        return $this->geom;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->pointsCollecte = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add pointsCollecte
     *
     * @param \Geograph\ProgdechBundle\Entity\PointCollecte $pointsCollecte
     * @return Commune
     */
    public function addPointsCollecte(\Geograph\ProgdechBundle\Entity\PointCollecte $pointsCollecte)
    {
        $this->pointsCollecte[] = $pointsCollecte;

        return $this;
    }

    /**
     * Remove pointsCollecte
     *
     * @param \Geograph\ProgdechBundle\Entity\PointCollecte $pointsCollecte
     */
    public function removePointsCollecte(\Geograph\ProgdechBundle\Entity\PointCollecte $pointsCollecte)
    {
        $this->pointsCollecte->removeElement($pointsCollecte);
    }

    /**
     * Get pointsCollecte
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPointsCollecte()
    {
        return $this->pointsCollecte;
    }
}