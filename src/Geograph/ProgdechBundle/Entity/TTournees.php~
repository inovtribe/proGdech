<?php

namespace Geograph\ProgdechBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TTournees
 *
 * @ORM\Table(name="t_tournees", indexes={@ORM\Index(name="IDX_78B979175137C5C7", columns={"id_jour"}), @ORM\Index(name="IDX_78B979176B3CA4B", columns={"id_user"})})
 * @ORM\Entity
 */
class TTournees
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_tournee", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="t_tournees_id_tournee_seq", allocationSize=1, initialValue=1)
     */
    private $idTournee;

    /**
     * @var string
     *
     * @ORM\Column(name="ref_tournee", type="string", length=20, nullable=false)
     */
    private $refTournee;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_tournee", type="string", length=50, nullable=true)
     */
    private $nomTournee;

    /**
     * @var \TJours
     *
     * @ORM\ManyToOne(targetEntity="TJours")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_jour", referencedColumnName="id_jour")
     * })
     */
    private $idJour;

    /**
     * @var \TUsers
     *
     * @ORM\ManyToOne(targetEntity="TUsers")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_user", referencedColumnName="id_user")
     * })
     */
    private $idUser;



    /**
     * Get idTournee
     *
     * @return integer 
     */
    public function getIdTournee()
    {
        return $this->idTournee;
    }

    /**
     * Set refTournee
     *
     * @param string $refTournee
     * @return TTournees
     */
    public function setRefTournee($refTournee)
    {
        $this->refTournee = $refTournee;

        return $this;
    }

    /**
     * Get refTournee
     *
     * @return string 
     */
    public function getRefTournee()
    {
        return $this->refTournee;
    }

    /**
     * Set nomTournee
     *
     * @param string $nomTournee
     * @return TTournees
     */
    public function setNomTournee($nomTournee)
    {
        $this->nomTournee = $nomTournee;

        return $this;
    }

    /**
     * Get nomTournee
     *
     * @return string 
     */
    public function getNomTournee()
    {
        return $this->nomTournee;
    }

    /**
     * Set idJour
     *
     * @param \Geograph\ProgdechBundle\Entity\TJours $idJour
     * @return TTournees
     */
    public function setIdJour(\Geograph\ProgdechBundle\Entity\TJours $idJour = null)
    {
        $this->idJour = $idJour;

        return $this;
    }

    /**
     * Get idJour
     *
     * @return \Geograph\ProgdechBundle\Entity\TJours 
     */
    public function getIdJour()
    {
        return $this->idJour;
    }

    /**
     * Set idUser
     *
     * @param \Geograph\ProgdechBundle\Entity\TUsers $idUser
     * @return TTournees
     */
    public function setIdUser(\Geograph\ProgdechBundle\Entity\TUsers $idUser = null)
    {
        $this->idUser = $idUser;

        return $this;
    }

    /**
     * Get idUser
     *
     * @return \Geograph\ProgdechBundle\Entity\TUsers 
     */
    public function getIdUser()
    {
        return $this->idUser;
    }
}
