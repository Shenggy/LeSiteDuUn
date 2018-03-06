<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Thread
 *
 * @ORM\Table(name="thread")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ThreadRepository")
 */
class Thread
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
     * @ORM\Column(name="NomThread", type="string", length=255, unique=true)
     */
    private $nomThread;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DateCreation", type="datetimetz")
     */
    private $dateCreation;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DateModification", type="datetimetz")
     */
    private $dateModification;

    /**
     * @var string
     *
     * @ORM\Column(name="Etat", type="string", length=255)
     */
    private $etat;

    /**
     * @var int
     *
     * @ORM\Column(name="nbVues", type="integer")
     */
    private $nbVues;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Categorie")
     * @ORM\JoinColumn(name="categorie_id", referencedColumnName="id")
     */
    private $categorie;


    /**
     * Get id
     *
     * @return int
     */

    public function __construct() {
        $this->dateCreation = new \DateTime();
        $this->dateModification = new \DateTime();
        $this->nbVues = 0;
    }

    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nomThread
     *
     * @param string $nomThread
     *
     * @return Thread
     */
    public function setNomThread($nomThread)
    {
        $this->nomThread = $nomThread;

        return $this;
    }

    /**
     * Get nomThread
     *
     * @return string
     */
    public function getNomThread()
    {
        return $this->nomThread;
    }

    /**
     * Set dateCreation
     *
     * @param \DateTime $dateCreation
     *
     * @return Thread
     */
    public function setDateCreation($dateCreation)
    {
        $this->dateCreation = $dateCreation;

        return $this;
    }

    /**
     * Get dateCreation
     *
     * @return \DateTime
     */
    public function getDateCreation()
    {
        return $this->dateCreation;
    }

    /**
     * Set dateModification
     *
     * @param \DateTime $dateCreation
     *
     * @return Thread
     */
    public function setDateModification($dateModification)
    {
        $this->dateModification = $dateModification;

        return $this;
    }

    /**
     * Get dateModification
     *
     * @return \DateTime
     */
    public function getDateModification()
    {
        return $this->dateModification;
    }

    /**
     * Set etat
     *
     * @param string $etat
     *
     * @return Thread
     */
    public function setEtat($etat)
    {
        $this->etat = $etat;

        return $this;
    }

    /**
     * Get etat
     *
     * @return string
     */
    public function getEtat()
    {
        return $this->etat;
    }

    /**
     * Set nbVues
     *
     * @param integer $nbVues
     *
     * @return Thread
     */
    public function setNbVues($nbVues)
    {
        $this->nbVues = $nbVues;

        return $this;
    }

    /**
     * Get nbVues
     *
     * @return int
     */
    public function getNbVues()
    {
        return $this->nbVues;
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

    /**
     * @return mixed
     */
    public function getCategorie()
    {
        return $this->categorie;
    }

    /**
     * @param mixed $categorie
     */
    public function setCategorie($categorie)
    {
        $this->categorie = $categorie;
    }



}

