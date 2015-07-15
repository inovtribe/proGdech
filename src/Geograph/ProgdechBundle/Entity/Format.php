<?php

namespace Geograph\ProgdechBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Format
 *
 * @ORM\Table(name="t_formats")
 * @ORM\Entity
 */
class Format
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_format", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="t_formats_id_format_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_format", type="string", length=20, nullable=true)
     */
    private $nom;
    
    /**
     * @ORM\OneToMany(targetEntity="Modelebac", mappedBy="format")
     */
    protected $formats;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->formats = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return Format
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
     * Add formats
     *
     * @param \Geograph\ProgdechBundle\Entity\Modelebac $formats
     * @return Format
     */
    public function addFormat(\Geograph\ProgdechBundle\Entity\Modelebac $formats)
    {
        $this->formats[] = $formats;

        return $this;
    }

    /**
     * Remove formats
     *
     * @param \Geograph\ProgdechBundle\Entity\Modelebac $formats
     */
    public function removeFormat(\Geograph\ProgdechBundle\Entity\Modelebac $formats)
    {
        $this->formats->removeElement($formats);
    }

    /**
     * Get formats
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getFormats()
    {
        return $this->formats;
    }
}
