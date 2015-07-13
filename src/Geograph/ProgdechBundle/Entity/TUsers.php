<?php

namespace Geograph\ProgdechBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TUsers
 *
 * @ORM\Table(name="t_users")
 * @ORM\Entity
 */
class TUsers
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_user", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="t_users_id_user_seq", allocationSize=1, initialValue=1)
     */
    private $idUser;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_user", type="string", length=50, nullable=true)
     */
    private $nomUser;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom_user", type="string", length=50, nullable=true)
     */
    private $prenomUser;

    /**
     * @var string
     *
     * @ORM\Column(name="login_user", type="string", length=20, nullable=true)
     */
    private $loginUser;

    /**
     * @var string
     *
     * @ORM\Column(name="mdp_user", type="string", length=88, nullable=true)
     */
    private $mdpUser;

    /**
     * @var string
     *
     * @ORM\Column(name="salt_user", type="string", length=23, nullable=true)
     */
    private $saltUser;

    /**
     * @var string
     *
     * @ORM\Column(name="role_user", type="string", length=50, nullable=true)
     */
    private $roleUser;

    /**
     * @var boolean
     *
     * @ORM\Column(name="actif_user", type="boolean", nullable=true)
     */
    private $actifUser;



    /**
     * Get idUser
     *
     * @return integer 
     */
    public function getIdUser()
    {
        return $this->idUser;
    }

    /**
     * Set nomUser
     *
     * @param string $nomUser
     * @return TUsers
     */
    public function setNomUser($nomUser)
    {
        $this->nomUser = $nomUser;

        return $this;
    }

    /**
     * Get nomUser
     *
     * @return string 
     */
    public function getNomUser()
    {
        return $this->nomUser;
    }

    /**
     * Set prenomUser
     *
     * @param string $prenomUser
     * @return TUsers
     */
    public function setPrenomUser($prenomUser)
    {
        $this->prenomUser = $prenomUser;

        return $this;
    }

    /**
     * Get prenomUser
     *
     * @return string 
     */
    public function getPrenomUser()
    {
        return $this->prenomUser;
    }

    /**
     * Set loginUser
     *
     * @param string $loginUser
     * @return TUsers
     */
    public function setLoginUser($loginUser)
    {
        $this->loginUser = $loginUser;

        return $this;
    }

    /**
     * Get loginUser
     *
     * @return string 
     */
    public function getLoginUser()
    {
        return $this->loginUser;
    }

    /**
     * Set mdpUser
     *
     * @param string $mdpUser
     * @return TUsers
     */
    public function setMdpUser($mdpUser)
    {
        $this->mdpUser = $mdpUser;

        return $this;
    }

    /**
     * Get mdpUser
     *
     * @return string 
     */
    public function getMdpUser()
    {
        return $this->mdpUser;
    }

    /**
     * Set saltUser
     *
     * @param string $saltUser
     * @return TUsers
     */
    public function setSaltUser($saltUser)
    {
        $this->saltUser = $saltUser;

        return $this;
    }

    /**
     * Get saltUser
     *
     * @return string 
     */
    public function getSaltUser()
    {
        return $this->saltUser;
    }

    /**
     * Set roleUser
     *
     * @param string $roleUser
     * @return TUsers
     */
    public function setRoleUser($roleUser)
    {
        $this->roleUser = $roleUser;

        return $this;
    }

    /**
     * Get roleUser
     *
     * @return string 
     */
    public function getRoleUser()
    {
        return $this->roleUser;
    }

    /**
     * Set actifUser
     *
     * @param boolean $actifUser
     * @return TUsers
     */
    public function setActifUser($actifUser)
    {
        $this->actifUser = $actifUser;

        return $this;
    }

    /**
     * Get actifUser
     *
     * @return boolean 
     */
    public function getActifUser()
    {
        return $this->actifUser;
    }
}
