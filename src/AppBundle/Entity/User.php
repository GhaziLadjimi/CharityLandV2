<?php
// src/AppBundle/Entity/User.php

namespace AppBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string")
     */
    private $first_name;
    /**
     * @ORM\Column(type="string")
     */
    private $last_name;
    /**
     * @ORM\Column(type="date")
     */
    private $birth_date;
    /**
     * @ORM\Column(type="string")
     */
    private $address;
    /**
     * @ORM\Column(type="string")
     */
    private $description;
    /**
     * @ORM\Column(type="string")
     */
    private $logo;
    public function __construct()
    {
        parent::__construct();

        // your own logic
    }

}