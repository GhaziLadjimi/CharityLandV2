<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Historique
 *
 * @ORM\Table(name="historique")
 * @ORM\Entity
 */
class Historique
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_declaration", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idDeclaration;

    /**
     * @var string
     *
     * @ORM\Column(name="sujet", type="string", length=250, nullable=false)
     */
    private $sujet;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=200, nullable=false)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="lieu", type="text", length=65535, nullable=false)
     */
    private $lieu;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date", nullable=false)
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", length=65535, nullable=false)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="etat", type="string", length=200, nullable=false)
     */
    private $etat;

    /**
     * @var string
     *
     * @ORM\Column(name="action", type="string", length=200, nullable=false)
     */
    private $action;

    /**
     * @var string
     *
     * @ORM\Column(name="photo", type="string", length=255, nullable=false)
     */
    private $photo;


}

