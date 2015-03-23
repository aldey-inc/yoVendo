<?php

namespace YoVendo\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Userhasclient
 *
 * @ORM\Table(name="userhasclient", indexes={@ORM\Index(name="fk_User_has_Client_Client1_idx", columns={"idClient"}), @ORM\Index(name="fk_User_has_Client_User1_idx", columns={"idUser"})})
 * @ORM\Entity
 */
class Userhasclient
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idUserHasClient", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $iduserhasclient;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="createdAt", type="datetime", nullable=false)
     */
    private $createdat;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updatedAt", type="datetime", nullable=false)
     */
    private $updatedat;

    /**
     * @var \Client
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Client")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idClient", referencedColumnName="idClient")
     * })
     */
    private $idclient;

    /**
     * @var \User
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idUser", referencedColumnName="idUser")
     * })
     */
    private $iduser;



    /**
     * Set iduserhasclient
     *
     * @param integer $iduserhasclient
     * @return Userhasclient
     */
    public function setIduserhasclient($iduserhasclient)
    {
        $this->iduserhasclient = $iduserhasclient;

        return $this;
    }

    /**
     * Get iduserhasclient
     *
     * @return integer 
     */
    public function getIduserhasclient()
    {
        return $this->iduserhasclient;
    }

    /**
     * Set createdat
     *
     * @param \DateTime $createdat
     * @return Userhasclient
     */
    public function setCreatedat($createdat)
    {
        $this->createdat = $createdat;

        return $this;
    }

    /**
     * Get createdat
     *
     * @return \DateTime 
     */
    public function getCreatedat()
    {
        return $this->createdat;
    }

    /**
     * Set updatedat
     *
     * @param \DateTime $updatedat
     * @return Userhasclient
     */
    public function setUpdatedat($updatedat)
    {
        $this->updatedat = $updatedat;

        return $this;
    }

    /**
     * Get updatedat
     *
     * @return \DateTime 
     */
    public function getUpdatedat()
    {
        return $this->updatedat;
    }

    /**
     * Set idclient
     *
     * @param \YoVendo\MainBundle\Entity\Client $idclient
     * @return Userhasclient
     */
    public function setIdclient(\YoVendo\MainBundle\Entity\Client $idclient)
    {
        $this->idclient = $idclient;

        return $this;
    }

    /**
     * Get idclient
     *
     * @return \YoVendo\MainBundle\Entity\Client 
     */
    public function getIdclient()
    {
        return $this->idclient;
    }

    /**
     * Set iduser
     *
     * @param \YoVendo\MainBundle\Entity\User $iduser
     * @return Userhasclient
     */
    public function setIduser(\YoVendo\MainBundle\Entity\User $iduser)
    {
        $this->iduser = $iduser;

        return $this;
    }

    /**
     * Get iduser
     *
     * @return \YoVendo\MainBundle\Entity\User 
     */
    public function getIduser()
    {
        return $this->iduser;
    }
}
