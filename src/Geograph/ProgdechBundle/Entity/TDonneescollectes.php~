<?php

namespace Geograph\ProgdechBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TDonneescollectes
 *
 * @ORM\Table(name="t_donneescollectes", indexes={@ORM\Index(name="IDX_48ED2E61356BD40E", columns={"id_tournee"}), @ORM\Index(name="IDX_48ED2E616B3CA4B", columns={"id_user"})})
 * @ORM\Entity
 */
class TDonneescollectes
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_donneecollecte", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="t_donneescollectes_id_donneecollecte_seq", allocationSize=1, initialValue=1)
     */
    private $idDonneecollecte;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_donneecollecte", type="date", nullable=true)
     */
    private $dateDonneecollecte;

    /**
     * @var integer
     *
     * @ORM\Column(name="distance_donneecollecte", type="integer", nullable=true)
     */
    private $distanceDonneecollecte;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="temps_donneecollecte", type="datetimetz", nullable=true)
     */
    private $tempsDonneecollecte;

    /**
     * @var integer
     *
     * @ORM\Column(name="poid_donneecollecte", type="integer", nullable=true)
     */
    private $poidDonneecollecte;

    /**
     * @var string
     *
     * @ORM\Column(name="observations_donneecollecte", type="string", length=255, nullable=true)
     */
    private $observationsDonneecollecte;

    /**
     * @var \TTournees
     *
     * @ORM\ManyToOne(targetEntity="TTournees")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_tournee", referencedColumnName="id_tournee")
     * })
     */
    private $idTournee;

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
     * Get idDonneecollecte
     *
     * @return integer 
     */
    public function getIdDonneecollecte()
    {
        return $this->idDonneecollecte;
    }

    /**
     * Set dateDonneecollecte
     *
     * @param \DateTime $dateDonneecollecte
     * @return TDonneescollectes
     */
    public function setDateDonneecollecte($dateDonneecollecte)
    {
        $this->dateDonneecollecte = $dateDonneecollecte;

        return $this;
    }

    /**
     * Get dateDonneecollecte
     *
     * @return \DateTime 
     */
    public function getDateDonneecollecte()
    {
        return $this->dateDonneecollecte;
    }

    /**
     * Set distanceDonneecollecte
     *
     * @param integer $distanceDonneecollecte
     * @return TDonneescollectes
     */
    public function setDistanceDonneecollecte($distanceDonneecollecte)
    {
        $this->distanceDonneecollecte = $distanceDonneecollecte;

        return $this;
    }

    /**
     * Get distanceDonneecollecte
     *
     * @return integer 
     */
    public function getDistanceDonneecollecte()
    {
        return $this->distanceDonneecollecte;
    }

    /**
     * Set tempsDonneecollecte
     *
     * @param \DateTime $tempsDonneecollecte
     * @return TDonneescollectes
     */
    public function setTempsDonneecollecte($tempsDonneecollecte)
    {
        $this->tempsDonneecollecte = $tempsDonneecollecte;

        return $this;
    }

    /**
     * Get tempsDonneecollecte
     *
     * @return \DateTime 
     */
    public function getTempsDonneecollecte()
    {
        return $this->tempsDonneecollecte;
    }

    /**
     * Set poidDonneecollecte
     *
     * @param integer $poidDonneecollecte
     * @return TDonneescollectes
     */
    public function setPoidDonneecollecte($poidDonneecollecte)
    {
        $this->poidDonneecollecte = $poidDonneecollecte;

        return $this;
    }

    /**
     * Get poidDonneecollecte
     *
     * @return integer 
     */
    public function getPoidDonneecollecte()
    {
        return $this->poidDonneecollecte;
    }

    /**
     * Set observationsDonneecollecte
     *
     * @param string $observationsDonneecollecte
     * @return TDonneescollectes
     */
    public function setObservationsDonneecollecte($observationsDonneecollecte)
    {
        $this->observationsDonneecollecte = $observationsDonneecollecte;

        return $this;
    }

    /**
     * Get observationsDonneecollecte
     *
     * @return string 
     */
    public function getObservationsDonneecollecte()
    {
        return $this->observationsDonneecollecte;
    }

    /**
     * Set idTournee
     *
     * @param \Geograph\ProgdechBundle\Entity\TTournees $idTournee
     * @return TDonneescollectes
     */
    public function setIdTournee(\Geograph\ProgdechBundle\Entity\TTournees $idTournee = null)
    {
        $this->idTournee = $idTournee;

        return $this;
    }

    /**
     * Get idTournee
     *
     * @return \Geograph\ProgdechBundle\Entity\TTournees 
     */
    public function getIdTournee()
    {
        return $this->idTournee;
    }

    /**
     * Set idUser
     *
     * @param \Geograph\ProgdechBundle\Entity\TUsers $idUser
     * @return TDonneescollectes
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
