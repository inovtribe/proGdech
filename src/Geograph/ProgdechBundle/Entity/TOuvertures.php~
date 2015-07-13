<?php

namespace Geograph\ProgdechBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TOuvertures
 *
 * @ORM\Table(name="t_ouvertures")
 * @ORM\Entity
 */
class TOuvertures
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_ouverture", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="t_ouvertures_id_ouverture_seq", allocationSize=1, initialValue=1)
     */
    private $idOuverture;

    /**
     * @var string
     *
     * @ORM\Column(name="type_ouverture", type="string", length=20, nullable=true)
     */
    private $typeOuverture;



    /**
     * Get idOuverture
     *
     * @return integer 
     */
    public function getIdOuverture()
    {
        return $this->idOuverture;
    }

    /**
     * Set typeOuverture
     *
     * @param string $typeOuverture
     * @return TOuvertures
     */
    public function setTypeOuverture($typeOuverture)
    {
        $this->typeOuverture = $typeOuverture;

        return $this;
    }

    /**
     * Get typeOuverture
     *
     * @return string 
     */
    public function getTypeOuverture()
    {
        return $this->typeOuverture;
    }
}
