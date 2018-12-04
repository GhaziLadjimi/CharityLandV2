<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Event
 *
 * @ORM\Table(name="event")
 * @ORM\Entity
 */
class Event
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_Event", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idEvent;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255, nullable=false)
     */
    private $nom;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date", nullable=false)
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="lieu", type="string", length=255, nullable=false)
     */
    private $lieu;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", length=65535, nullable=false)
     */
    private $description;

    /**
     * @var integer
     *
     * @ORM\Column(name="nb_interresse", type="integer", nullable=true)
     */
    private $nbInterresse = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="nb_max", type="integer", nullable=true)
     */
    private $nbMax = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="photo", type="string", length=255, nullable=true)
     */
    private $photo;

    /**
     * @var integer
     *
     * @ORM\Column(name="nb_participant", type="integer", nullable=true)
     */
    private $nbParticipant;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_association", type="integer", nullable=false)
     */
    private $idAssociation;


}

