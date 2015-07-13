<?php

namespace Geograph\ProgdechBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TPhotos
 *
 * @ORM\Table(name="t_photos", indexes={@ORM\Index(name="IDX_211198272D8A6AB4", columns={"id_ptcollecte"})})
 * @ORM\Entity
 */
class TPhotos
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_photo", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="t_photos_id_photo_seq", allocationSize=1, initialValue=1)
     */
    private $idPhoto;

    /**
     * @var string
     *
     * @ORM\Column(name="url_photo", type="string", length=255, nullable=true)
     */
    private $urlPhoto;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_photo", type="date", nullable=true)
     */
    private $datePhoto;

    /**
     * @var \PointCollecte
     *
     * @ORM\ManyToOne(targetEntity="PointCollecte")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_ptcollecte", referencedColumnName="id_ptcollecte")
     * })
     */
    private $idPtcollecte;



    /**
     * Get idPhoto
     *
     * @return integer 
     */
    public function getIdPhoto()
    {
        return $this->idPhoto;
    }

    /**
     * Set urlPhoto
     *
     * @param string $urlPhoto
     * @return TPhotos
     */
    public function setUrlPhoto($urlPhoto)
    {
        $this->urlPhoto = $urlPhoto;

        return $this;
    }

    /**
     * Get urlPhoto
     *
     * @return string 
     */
    public function getUrlPhoto()
    {
        return $this->urlPhoto;
    }

    /**
     * Set datePhoto
     *
     * @param \DateTime $datePhoto
     * @return TPhotos
     */
    public function setDatePhoto($datePhoto)
    {
        $this->datePhoto = $datePhoto;

        return $this;
    }

    /**
     * Get datePhoto
     *
     * @return \DateTime 
     */
    public function getDatePhoto()
    {
        return $this->datePhoto;
    }

    /**
     * Set idPtcollecte
     *
     * @param \Geograph\ProgdechBundle\Entity\PointCollecte $idPtcollecte
     * @return TPhotos
     */
    public function setIdPtcollecte(\Geograph\ProgdechBundle\Entity\PointCollecte $idPtcollecte = null)
    {
        $this->idPtcollecte = $idPtcollecte;

        return $this;
    }

    /**
     * Get idPtcollecte
     *
     * @return \Geograph\ProgdechBundle\Entity\PointCollecte 
     */
    public function getIdPtcollecte()
    {
        return $this->idPtcollecte;
    }
}
