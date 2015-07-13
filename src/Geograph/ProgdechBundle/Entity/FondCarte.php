<?php

namespace Geograph\ProgdechBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Typefondscarte
 *
 * @ORM\Table(name="t_fondscarte")
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="Geograph\ProgdechBundle\Repository\FondCarteRepository")
 */

class FondCarte
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_fondcarte", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="t_fondscarte_id_fondcarte_seq", allocationSize=1, initialValue=1)
     */
    private $id;
    
    /**
     * @var string
     *
     * @ORM\Column(name="nom_fondcarte", type="string", length=50, nullable=false)
     */
    private $nom;
    
    /**
     * @var string
     *
     * @ORM\Column(name="url_fondcarte", type="string", length=255, nullable=false)
     */
    private $url;
    
    /**
     * @var string
     *
     * @ORM\Column(name="attribution_fondcarte", type="string", length=255, nullable=false)
     */
    private $attribution;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="minzoom_fondcarte", type="integer", nullable=false)
     */
    private $minzoom;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="maxzoom_fondcarte", type="integer", nullable=false)
     */
    private $maxzoom;
    
    /**
     * @var \TTypesfondscarte
     *
     * @ORM\ManyToOne(targetEntity="TypeFondCarte", inversedBy="fondCarte")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_typefondcarte", referencedColumnName="id_typefondcarte", onDelete="restrict")
     * })
     */
    private $typefondcarte; 
    

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
     * @return FondCarte
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
     * Set url
     *
     * @param string $url
     * @return FondCarte
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url
     *
     * @return string 
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set attribution
     *
     * @param string $attribution
     * @return FondCarte
     */
    public function setAttribution($attribution)
    {
        $this->attribution = $attribution;

        return $this;
    }

    /**
     * Get attribution
     *
     * @return string 
     */
    public function getAttribution()
    {
        return $this->attribution;
    }

    /**
     * Set minzoom
     *
     * @param integer $minzoom
     * @return FondCarte
     */
    public function setMinzoom($minzoom)
    {
        $this->minzoom = $minzoom;

        return $this;
    }

    /**
     * Get minzoom
     *
     * @return integer 
     */
    public function getMinzoom()
    {
        return $this->minzoom;
    }

    /**
     * Set maxzoom
     *
     * @param integer $maxzoom
     * @return FondCarte
     */
    public function setMaxzoom($maxzoom)
    {
        $this->maxzoom = $maxzoom;

        return $this;
    }

    /**
     * Get maxzoom
     *
     * @return integer 
     */
    public function getMaxzoom()
    {
        return $this->maxzoom;
    }

    /**
     * Set typefondcarte
     *
     * @param \Geograph\ProgdechBundle\Entity\TypeFondCarte $typefondcarte
     * @return FondCarte
     */
    public function setTypefondcarte(\Geograph\ProgdechBundle\Entity\TypeFondCarte $typefondcarte = null)
    {
        $this->typefondcarte = $typefondcarte;

        return $this;
    }

    /**
     * Get typefondcarte
     *
     * @return \Geograph\ProgdechBundle\Entity\TypeFondCarte 
     */
    public function getTypefondcarte()
    {
        return $this->typefondcarte;
    }
}
