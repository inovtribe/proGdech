<?php

namespace Geograph\ProgdechBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TFormats
 *
 * @ORM\Table(name="t_formats")
 * @ORM\Entity
 */
class TFormats
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_format", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="t_formats_id_format_seq", allocationSize=1, initialValue=1)
     */
    private $idFormat;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_format", type="string", length=20, nullable=true)
     */
    private $nomFormat;



    /**
     * Get idFormat
     *
     * @return integer 
     */
    public function getIdFormat()
    {
        return $this->idFormat;
    }

    /**
     * Set nomFormat
     *
     * @param string $nomFormat
     * @return TFormats
     */
    public function setNomFormat($nomFormat)
    {
        $this->nomFormat = $nomFormat;

        return $this;
    }

    /**
     * Get nomFormat
     *
     * @return string 
     */
    public function getNomFormat()
    {
        return $this->nomFormat;
    }
}
