<?php

namespace Geograph\ProgdechBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TTypeflux
 *
 * @ORM\Table(name="t_typeflux")
 * @ORM\Entity
 */
class TTypeflux
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_typeflux", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="t_typeflux_id_typeflux_seq", allocationSize=1, initialValue=1)
     */
    private $idTypeflux;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_typeflux", type="string", length=50, nullable=true)
     */
    private $nomTypeflux;

    /**
     * @var boolean
     *
     * @ORM\Column(name="volontaire_typeflux", type="boolean", nullable=true)
     */
    private $volontaireTypeflux;



    /**
     * Get idTypeflux
     *
     * @return integer 
     */
    public function getIdTypeflux()
    {
        return $this->idTypeflux;
    }

    /**
     * Set nomTypeflux
     *
     * @param string $nomTypeflux
     * @return TTypeflux
     */
    public function setNomTypeflux($nomTypeflux)
    {
        $this->nomTypeflux = $nomTypeflux;

        return $this;
    }

    /**
     * Get nomTypeflux
     *
     * @return string 
     */
    public function getNomTypeflux()
    {
        return $this->nomTypeflux;
    }

    /**
     * Set volontaireTypeflux
     *
     * @param boolean $volontaireTypeflux
     * @return TTypeflux
     */
    public function setVolontaireTypeflux($volontaireTypeflux)
    {
        $this->volontaireTypeflux = $volontaireTypeflux;

        return $this;
    }

    /**
     * Get volontaireTypeflux
     *
     * @return boolean 
     */
    public function getVolontaireTypeflux()
    {
        return $this->volontaireTypeflux;
    }
}
