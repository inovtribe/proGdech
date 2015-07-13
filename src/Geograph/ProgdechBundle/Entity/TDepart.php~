<?php

namespace Geograph\ProgdechBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TDepart
 *
 * @ORM\Table(name="t_depart")
 * @ORM\Entity
 */
class TDepart
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_depart", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="t_depart_id_depart_seq", allocationSize=1, initialValue=1)
     */
    private $idDepart;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_depart", type="string", length=50, nullable=false)
     */
    private $nomDepart;

    /**
     * @var integer
     *
     * @ORM\Column(name="code_depart", type="integer", nullable=false)
     */
    private $codeDepart;



    /**
     * Get idDepart
     *
     * @return integer 
     */
    public function getIdDepart()
    {
        return $this->idDepart;
    }

    /**
     * Set nomDepart
     *
     * @param string $nomDepart
     * @return TDepart
     */
    public function setNomDepart($nomDepart)
    {
        $this->nomDepart = $nomDepart;

        return $this;
    }

    /**
     * Get nomDepart
     *
     * @return string 
     */
    public function getNomDepart()
    {
        return $this->nomDepart;
    }

    /**
     * Set codeDepart
     *
     * @param integer $codeDepart
     * @return TDepart
     */
    public function setCodeDepart($codeDepart)
    {
        $this->codeDepart = $codeDepart;

        return $this;
    }

    /**
     * Get codeDepart
     *
     * @return integer 
     */
    public function getCodeDepart()
    {
        return $this->codeDepart;
    }
}
