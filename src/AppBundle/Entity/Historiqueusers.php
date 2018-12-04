<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Historiqueusers
 *
 * @ORM\Table(name="historiqueusers")
 * @ORM\Entity
 */
class Historiqueusers
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="first_name", type="string", length=20, nullable=false)
     */
    private $firstName;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=30, nullable=false)
     */
    private $name;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="birth_date", type="date", nullable=false)
     */
    private $birthDate;

    /**
     * @var string
     *
     * @ORM\Column(name="phone", type="string", length=30, nullable=false)
     */
    private $phone;

    /**
     * @var string
     *
     * @ORM\Column(name="mail", type="string", length=35, nullable=false)
     */
    private $mail;

    /**
     * @var string
     *
     * @ORM\Column(name="adress", type="string", length=35, nullable=false)
     */
    private $adress;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=25, nullable=false)
     */
    private $description = 'descrition';

    /**
     * @var string
     *
     * @ORM\Column(name="role", type="string", length=25, nullable=false)
     */
    private $role;


}

