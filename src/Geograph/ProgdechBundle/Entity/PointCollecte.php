<?php

namespace Geograph\ProgdechBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PointCollecte
 * 
 * @ORM\Table(name="t_ptscollecte", indexes={@ORM\Index(name="IDX_C3F488B8FA122EBC", columns={"id_com"}), @ORM\Index(name="IDX_C3F488B86B3CA4B", columns={"id_user"})})
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="Geograph\ProgdechBundle\Repository\PointCollecteRepository")
 */
class PointCollecte
{    
    /**
     * @var integer
     *
     * @ORM\Column(name="id_ptcollecte", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="t_ptscollecte_id_ptcollecte_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="ref_ptcollecte", type="string", length=20, nullable=false)
     */
    private $reference;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_ptcollecte", type="string", length=50, nullable=true)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse_ptcollecte", type="string", length=100, nullable=true)
     */
    private $adresse;

    /**
     * @var string
     *
     * @ORM\Column(name="lat_ptcollecte", type="decimal", precision=9, scale=6, nullable=false)
     */
    private $latitude;

    /**
     * @var string
     *
     * @ORM\Column(name="lng_ptcollecte", type="decimal", precision=9, scale=6, nullable=false)
     */
    private $longitude;

    /**
     * @var string
     *
     * @ORM\Column(name="emplacement_ptcollecte", type="decimal", precision=2, scale=0, nullable=true)
     */
    private $emplacement;
    
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_ptcollecte", type="date", nullable=false)
     */
    private $date;

    /**
     * @var \Commune
     *
     * @ORM\ManyToOne(targetEntity="Commune", inversedBy="pointsCollecte")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_com", referencedColumnName="id_com", onDelete="restrict")
     * })
     */
    private $commune;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User", inversedBy="pointscollecte")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_user", referencedColumnName="id_user", onDelete="restrict")
     * })
     */
    private $user;
    
    /**
     * @ORM\OneToMany(targetEntity="Photo", mappedBy="pointcollecte")
     */
    protected $photos;
    
    /**
     * @ORM\OneToMany(targetEntity="Observation", mappedBy="pointcollecte")
     */
    protected $observations;
    
    /**
     * @ORM\OneToMany(targetEntity="Bac", mappedBy="pointcollecte")
     */
    protected $bacs;
    
    private $typesbacs;

    private $volontaire;
    
    private $emplacements_affectes;
    
    private $emplacements_libres;
    
    public $marker = null;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->photos = new \Doctrine\Common\Collections\ArrayCollection();
        $this->observations = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set ref
     *
     * @param string $ref
     * @return PointCollecte
     */
    public function setRef($ref)
    {
        $this->ref = $ref;

        return $this;
    }

    /**
     * Get ref
     *
     * @return string 
     */
    public function getRef()
    {
        return $this->ref;
    }

    /**
     * Set nom
     *
     * @param string $nom
     * @return PointCollecte
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
     * Set adresse
     *
     * @param string $adresse
     * @return PointCollecte
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * Get adresse
     *
     * @return string 
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Set latitude
     *
     * @param string $latitude
     * @return PointCollecte
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;

        return $this;
    }

    /**
     * Get latitude
     *
     * @return string 
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * Set longitude
     *
     * @param string $longitude
     * @return PointCollecte
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;

        return $this;
    }

    /**
     * Get longitude
     *
     * @return string 
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * Set emplacement
     *
     * @param string $emplacement
     * @return PointCollecte
     */
    public function setEmplacement($emplacement)
    {
        $this->emplacement = $emplacement;

        return $this;
    }

    /**
     * Get emplacement
     *
     * @return string 
     */
    public function getEmplacement()
    {
        return $this->emplacement;
    }
    
    public function getEmplacementsAffectes()
    {
        return $this->emplacements_affectes;
    }
    public function setEmplacementsAffectes($bacs)
    {
        $this->emplacements_affectes = $bacs;
        $this->setEmplacementsDisponibles();
    }
    
    public function getEmplacementsDisponibles()
    {
        return $this->emplacements_libres;
    }
    public function setEmplacementsDisponibles()
    {
        return $this->emplacements_libres = $this->emplacement - $this->emplacements_affectes;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return PointCollecte
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set commune
     *
     * @param \Geograph\ProgdechBundle\Entity\Commune $commune
     * @return PointCollecte
     */
    public function setCommune(\Geograph\ProgdechBundle\Entity\Commune $commune = null)
    {
        $this->commune = $commune;

        return $this;
    }

    /**
     * Get commune
     *
     * @return \Geograph\ProgdechBundle\Entity\Commune 
     */
    public function getCommune()
    {
        return $this->commune;
    }

    /**
     * Set user
     *
     * @param \Geograph\ProgdechBundle\Entity\User $user
     * @return PointCollecte
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
     * Add photos
     *
     * @param \Geograph\ProgdechBundle\Entity\Photo $photos
     * @return PointCollecte
     */
    public function addPhoto(\Geograph\ProgdechBundle\Entity\Photo $photos)
    {
        $this->photos[] = $photos;

        return $this;
    }

    /**
     * Remove photos
     *
     * @param \Geograph\ProgdechBundle\Entity\Photo $photos
     */
    public function removePhoto(\Geograph\ProgdechBundle\Entity\Photo $photos)
    {
        $this->photos->removeElement($photos);
    }

    /**
     * Get photos
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPhotos()
    {
        return $this->photos;
    }

    /**
     * Add observations
     *
     * @param \Geograph\ProgdechBundle\Entity\Observation $observations
     * @return PointCollecte
     */
    public function addObservation(\Geograph\ProgdechBundle\Entity\Observation $observations)
    {
        $this->observations[] = $observations;

        return $this;
    }

    /**
     * Remove observations
     *
     * @param \Geograph\ProgdechBundle\Entity\Observation $observations
     */
    public function removeObservation(\Geograph\ProgdechBundle\Entity\Observation $observations)
    {
        $this->observations->removeElement($observations);
    }

    /**
     * Get observations
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getObservations()
    {
        return $this->observations;
    }

    /**
     * Set reference
     *
     * @param string $reference
     * @return PointCollecte
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
     * Add bacs
     *
     * @param \Geograph\ProgdechBundle\Entity\Bac $bacs
     * @return PointCollecte
     */
    public function addBac(\Geograph\ProgdechBundle\Entity\Bac $bacs)
    {
        $this->bacs[] = $bacs;
        $bacs->setPointcollecte($this);
    
        return $this;
    }

    /**
     * Remove bacs
     *
     * @param \Geograph\ProgdechBundle\Entity\Bac $bacs
     */
    public function removeBac(\Geograph\ProgdechBundle\Entity\Bac $bacs)
    {
        $this->bacs->removeElement($bacs);
    }

    /**
     * Get bacs
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getBacs()
    {
        return $this->bacs;
    }
    
    public function getVolontaire(){
        return $this->volontaire;
    }
    public function setVolontaire($type){
        $this->volontaire = $type;
    }
    
    public function getTypesBacs(){
        return $this->typesbacs;
    }
    
    public function setTypesBacs($types){
        $this->typesbacs = $types;
    }
}
