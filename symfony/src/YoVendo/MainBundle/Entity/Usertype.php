<?php

namespace YoVendo\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Usertype
 *
 * @ORM\Table(name="usertype")
 * @ORM\Entity
 */
class Usertype
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idUserType", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idusertype;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=45, nullable=false)
     */
    private $name;

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


}
