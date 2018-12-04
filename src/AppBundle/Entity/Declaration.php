<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Declaration
 *
 * @ORM\Table(name="declaration")
 * @ORM\Entity
 */
class Declaration
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_Declaration", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idDeclaration;

    /**
     * @var string
     *
     * @ORM\Column(name="sujet", type="string", length=255, nullable=false)
     */
    private $sujet;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255, nullable=false)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="lieu", type="string", length=255, nullable=false)
     */
    private $lieu;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime", nullable=false)
     */
    private $date = 'CURRENT_TIMESTAMP';

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", length=65535, nullable=false)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="etat", type="string", length=255, nullable=false)
     */
    private $etat = 'non lu';

    /**
     * @var string
     *
     * @ORM\Column(name="action", type="string", length=255, nullable=false)
     */
    private $action = 'non traité';

    /**
     * @var string
     *
     * @ORM\Column(name="photo", type="string", length=100, nullable=false)
     */
    private $photo;


}

