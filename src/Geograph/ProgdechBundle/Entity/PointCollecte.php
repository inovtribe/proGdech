<?php

namespace Geograph\ProgdechBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PointCollecte
 *
 * @ORM\Table(name="t_ptscollecte", indexes={@ORM\Index(name="IDX_C3F488B8FA122EBC", columns={"id_com"}), @ORM\Index(name="IDX_C3F488B8FA32C528", columns={"id_photo"}), @ORM\Index(name="IDX_C3F488B86B3CA4B", columns={"id_user"})})
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
    private $ref;

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
     *   @ORM\JoinColumn(name="id_com", referencedColumnName="id_com")
     * })
     */
    private $commune;

    /**
     * @var \TPhotos
     *
     * @ORM\ManyToOne(targetEntity="TPhotos")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_photo", referencedColumnName="id_photo")
     * })
     */
    private $photo;

    /**
     * @var \TUsers
     *
     * @ORM\ManyToOne(targetEntity="TUsers")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_user", referencedColumnName="id_user")
     * })
     */
    private $user;

    public $marker = null;

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
     * Set photo
     *
     * @param \Geograph\ProgdechBundle\Entity\TPhotos $photo
     * @return PointCollecte
     */
    public function setPhoto(\Geograph\ProgdechBundle\Entity\TPhotos $photo = null)
    {
        $this->photo = $photo;

        return $this;
    }

    /**
     * Get photo
     *
     * @return \Geograph\ProgdechBundle\Entity\TPhotos 
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * Set user
     *
     * @param \Geograph\ProgdechBundle\Entity\TUsers $user
     * @return PointCollecte
     */
    public function setUser(\Geograph\ProgdechBundle\Entity\TUsers $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \Geograph\ProgdechBundle\Entity\TUsers 
     */
    public function getUser()
    {
        return $this->user;
    }
}
