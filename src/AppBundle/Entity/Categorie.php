<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Categorie
 *
 * @ORM\Table(name="categorie")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CategorieRepository")
 */
class Categorie
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255, unique=true)
     */
    private $nom;

    /**
     * One Category has Many Categories.
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Categorie", mappedBy="parentCategorie")
     */
    private $subCategorie;

    /**
     * Many Categories have One Category.
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Categorie", inversedBy="subCategorie")
     * @ORM\JoinColumn(name="parent_id", referencedColumnName="id")
     */
    private $parentCategorie;

    public function __construct() {
        $this->subCategorie = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return Categorie
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @return mixed
     */
    public function getSubCategorie()
    {
        return $this->subCategorie;
    }

    /**
     * @param mixed $subCategorie
     */
    public function setSubCategorie($subCategorie)
    {
        $this->subCategorie = $subCategorie;
    }

    /**
     * @return mixed
     */
    public function getParentCategorie()
    {
        return $this->parentCategorie;
    }

    /**
     * @param mixed $parentCategorie
     */
    public function setParentCategorie($parentCategorie)
    {
        $this->parentCategorie = $parentCategorie;
    }

}

