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
     * @ORM\OneToMany(targetEntity="PointCollecte", mappedBy="commune")
     */
    protected $pointsCollecte;
    
    /**
     * @ORM\OneToMany(targetEntity="Population", mappedBy="commune")
     */
    protected $populations;
    
    private $nombre_pointscollecte;
            
    private $nombre_bacs;
    
    private $population_actuelle;
    
    private $densite;
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->pointsCollecte = new \Doctrine\Common\Collections\ArrayCollection();
        $this->nombre_bacs = 0;
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

    /**
     * Add populations
     *
     * @param \Geograph\ProgdechBundle\Entity\Population $populations
     * @return Commune
     */
    public function addPopulation(\Geograph\ProgdechBundle\Entity\Population $populations)
    {
        $this->populations[] = $populations;

        return $this;
    }

    /**
     * Remove populations
     *
     * @param \Geograph\ProgdechBundle\Entity\Population $populations
     */
    public function removePopulation(\Geograph\ProgdechBundle\Entity\Population $populations)
    {
        $this->populations->removeElement($populations);
    }

    /**
     * Get populations
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPopulations()
    {
        return $this->populations;
    }
    
    public function getNombrePointsCollecte(){
        return $this->nombre_pointscollecte;
    }
    public function setNombrePointsCollecte($nbr) {
        $this->nombre_pointscollecte = $nbr;
    }
    
    public function getNombreBacs(){
        return $this->nombre_bacs;
    }
    public function setNombreBacs($nbr) {
        $this->nombre_bacs = $nbr;
    }
    
    public function getPopulationActuelle(){
        return $this->population_actuelle;
    }
    public function setPopulationActuelle($nbr){
        $this->population_actuelle = $nbr;
    }
    
    public function getDensite(){
        return $this->densite;
    }
    public function setDensite($densite){
        $this->densite = $densite;
    }
}
