<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CommentaireEvent
 *
 * @ORM\Table(name="commentaire_event")
 * @ORM\Entity
 */
class CommentaireEvent
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_comment", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idComment;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_Event", type="integer", nullable=false)
     */
    private $idEvent;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_utilisateur", type="integer", nullable=false)
     */
    private $idUtilisateur;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime", nullable=false)
     */
    private $date = 'CURRENT_TIMESTAMP';

    /**
     * @var string
     *
     * @ORM\Column(name="comment", type="text", length=65535, nullable=false)
     */
    private $comment;


}

