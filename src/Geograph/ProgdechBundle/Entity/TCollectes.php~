<?php

namespace Geograph\ProgdechBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TCollectes
 *
 * @ORM\Table(name="t_collectes", indexes={@ORM\Index(name="IDX_C85974A682EB4402", columns={"id_bac"}), @ORM\Index(name="IDX_C85974A6356BD40E", columns={"id_tournee"}), @ORM\Index(name="IDX_C85974A66B3CA4B", columns={"id_user"})})
 * @ORM\Entity
 */
class TCollectes
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_collecte", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="t_collectes_id_collecte_seq", allocationSize=1, initialValue=1)
     */
    private $idCollecte;

    /**
     * @var integer
     *
     * @ORM\Column(name="position_collecte", type="integer", nullable=false)
     */
    private $positionCollecte;

    /**
     * @var \TBacs
     *
     * @ORM\ManyToOne(targetEntity="TBacs")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_bac", referencedColumnName="id_bac")
     * })
     */
    private $idBac;

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
     * Get idCollecte
     *
     * @return integer 
     */
    public function getIdCollecte()
    {
        return $this->idCollecte;
    }

    /**
     * Set positionCollecte
     *
     * @param integer $positionCollecte
     * @return TCollectes
     */
    public function setPositionCollecte($positionCollecte)
    {
        $this->positionCollecte = $positionCollecte;

        return $this;
    }

    /**
     * Get positionCollecte
     *
     * @return integer 
     */
    public function getPositionCollecte()
    {
        return $this->positionCollecte;
    }

    /**
     * Set idBac
     *
     * @param \Geograph\ProgdechBundle\Entity\TBacs $idBac
     * @return TCollectes
     */
    public function setIdBac(\Geograph\ProgdechBundle\Entity\TBacs $idBac = null)
    {
        $this->idBac = $idBac;

        return $this;
    }

    /**
     * Get idBac
     *
     * @return \Geograph\ProgdechBundle\Entity\TBacs 
     */
    public function getIdBac()
    {
        return $this->idBac;
    }

    /**
     * Set idTournee
     *
     * @param \Geograph\ProgdechBundle\Entity\TTournees $idTournee
     * @return TCollectes
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
     * @return TCollectes
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
