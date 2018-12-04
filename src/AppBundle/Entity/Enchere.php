<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Enchere
 *
 * @ORM\Table(name="enchere", indexes={@ORM\Index(name="produit", columns={"id_produit"})})
 * @ORM\Entity
 */
class Enchere
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
     * @ORM\Column(name="id_produit", type="integer", nullable=false)
     */
    private $idProduit;

    /**
     * @var string
     *
     * @ORM\Column(name="prix_initial", type="string", length=200, nullable=false)
     */
    private $prixInitial;

    /**
     * @var string
     *
     * @ORM\Column(name="acheteur", type="string", length=150, nullable=false)
     */
    private $acheteur;

    /**
     * @var string
     *
     * @ORM\Column(name="prix_incremente", type="string", length=200, nullable=false)
     */
    private $prixIncremente;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_enchere", type="date", nullable=false)
     */
    private $dateEnchere;


}

