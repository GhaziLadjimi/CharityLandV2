<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * HistoriqueEvent
 *
 * @ORM\Table(name="historique_event")
 * @ORM\Entity
 */
class HistoriqueEvent
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
     * @var string
     *
     * @ORM\Column(name="date", type="string", length=255, nullable=false)
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
     * @ORM\Column(name="description", type="string", length=255, nullable=false)
     */
    private $description;

    /**
     * @var integer
     *
     * @ORM\Column(name="nb_interresse", type="integer", nullable=false)
     */
    private $nbInterresse;

    /**
     * @var integer
     *
     * @ORM\Column(name="nb_max", type="integer", nullable=false)
     */
    private $nbMax;

    /**
     * @var integer
     *
     * @ORM\Column(name="nb_participant", type="integer", nullable=false)
     */
    private $nbParticipant;


}

