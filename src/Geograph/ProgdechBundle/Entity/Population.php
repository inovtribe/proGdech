<?php

namespace Geograph\ProgdechBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Population
 *
 * @ORM\Table(name="t_populations", indexes={@ORM\Index(name="IDX_45302A98FA122EBC", columns={"id_com"})})
 * @ORM\Entity
 */
class Population
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_population", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="t_populations_id_population_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="annee_population", type="integer", nullable=true)
     */
    private $annee;

    /**
     * @var integer
     *
     * @ORM\Column(name="nbre_population", type="integer", nullable=true)
     */
    private $nbre;

    /**
     * @var \Commune
     *
     * @ORM\ManyToOne(targetEntity="Commune", inversedBy="populations")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_com", referencedColumnName="id_com")
     * })
     */
    private $commune;
    

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
     * Set annee
     *
     * @param integer $annee
     * @return Population
     */
    public function setAnnee($annee)
    {
        $this->annee = $annee;

        return $this;
    }

    /**
     * Get annee
     *
     * @return integer 
     */
    public function getAnnee()
    {
        return $this->annee;
    }

    /**
     * Set nbre
     *
     * @param integer $nbre
     * @return Population
     */
    public function setNbre($nbre)
    {
        $this->nbre = $nbre;

        return $this;
    }

    /**
     * Get nbre
     *
     * @return integer 
     */
    public function getNbre()
    {
        return $this->nbre;
    }

    /**
     * Set commune
     *
     * @param \Geograph\ProgdechBundle\Entity\Commune $commune
     * @return Population
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
}
