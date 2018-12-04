<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Don
 *
 * @ORM\Table(name="don")
 * @ORM\Entity
 */
class Don
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
     * @var integer
     *
     * @ORM\Column(name="iduser", type="integer", nullable=true)
     */
    private $iduser;

    /**
     * @var integer
     *
     * @ORM\Column(name="iddestinataire", type="integer", nullable=true)
     */
    private $iddestinataire;

    /**
     * @var string
     *
     * @ORM\Column(name="type_destinataire", type="string", length=1000, nullable=false)
     */
    private $typeDestinataire;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=1000, nullable=false)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="date", type="string", length=100, nullable=false)
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="etat", type="string", length=1000, nullable=false)
     */
    private $etat;


}

