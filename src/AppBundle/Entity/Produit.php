<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Produit
 *
 * @ORM\Table(name="produit")
 * @ORM\Entity
 */
class Produit
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
     * @ORM\Column(name="libelle", type="string", length=250, nullable=false)
     */
    private $libelle;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", length=65535, nullable=false)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="age", type="string", length=50, nullable=false)
     */
    private $age;

    /**
     * @var string
     *
     * @ORM\Column(name="etat", type="string", length=100, nullable=false)
     */
    private $etat = 'disponible';

    /**
     * @var string
     *
     * @ORM\Column(name="image_produit", type="string", length=250, nullable=false)
     */
    private $imageProduit;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=250, nullable=false)
     */
    private $type;


}

