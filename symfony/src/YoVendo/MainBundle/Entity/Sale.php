<?php

namespace YoVendo\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Sale
 *
 * @ORM\Table(name="sale", indexes={@ORM\Index(name="fk_Product_has_Client_Client1_idx", columns={"idClient"}), @ORM\Index(name="fk_Product_has_Client_Product1_idx", columns={"idProduct"})})
 * @ORM\Entity
 */
class Sale
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idSale", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $idsale;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="saleAt", type="datetime", nullable=false)
     */
    private $saleat;

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
     * @var integer
     *
     * @ORM\Column(name="quantity", type="integer", nullable=false)
     */
    private $quantity = '0';

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
     * @var \Product
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Product")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idProduct", referencedColumnName="idProduct")
     * })
     */
    private $idproduct;



    /**
     * Set idsale
     *
     * @param integer $idsale
     * @return Sale
     */
    public function setIdsale($idsale)
    {
        $this->idsale = $idsale;

        return $this;
    }

    /**
     * Get idsale
     *
     * @return integer 
     */
    public function getIdsale()
    {
        return $this->idsale;
    }

    /**
     * Set saleat
     *
     * @param \DateTime $saleat
     * @return Sale
     */
    public function setSaleat($saleat)
    {
        $this->saleat = $saleat;

        return $this;
    }

    /**
     * Get saleat
     *
     * @return \DateTime 
     */
    public function getSaleat()
    {
        return $this->saleat;
    }

    /**
     * Set createdat
     *
     * @param \DateTime $createdat
     * @return Sale
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
     * @return Sale
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
     * Set quantity
     *
     * @param integer $quantity
     * @return Sale
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * Get quantity
     *
     * @return integer 
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Set idclient
     *
     * @param \YoVendo\MainBundle\Entity\Client $idclient
     * @return Sale
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
     * Set idproduct
     *
     * @param \YoVendo\MainBundle\Entity\Product $idproduct
     * @return Sale
     */
    public function setIdproduct(\YoVendo\MainBundle\Entity\Product $idproduct)
    {
        $this->idproduct = $idproduct;

        return $this;
    }

    /**
     * Get idproduct
     *
     * @return \YoVendo\MainBundle\Entity\Product 
     */
    public function getIdproduct()
    {
        return $this->idproduct;
    }
    public function __toString(){
        return (String)$this->getIdsale().' '.date_format($this->getSaleat(), 'Y-m-d H:i:s').' '.(String)$this->getQuantity();
        
    }
}
