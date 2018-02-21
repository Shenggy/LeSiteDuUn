<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MessagePrive
 *
 * @ORM\Table(name="message_prive")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\MessagePriveRepository")
 */
class MessagePrive
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
     * @ORM\Column(name="sujet", type="string", length=255)
     */
    private $sujet;

    /**
     * @var string
     *
     * @ORM\Column(name="contenu", type="text")
     */
    private $contenu;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateMessaPrive", type="datetime")
     */
    private $dateMessaPrive;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User")
     * @ORM\JoinColumn(name="dest_id", referencedColumnName="id")
     */
    private $destinataire;

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
     * Set sujet
     *
     * @param string $sujet
     *
     * @return MessagePrive
     */
    public function setSujet($sujet)
    {
        $this->sujet = $sujet;

        return $this;
    }

    /**
     * Get sujet
     *
     * @return string
     */
    public function getSujet()
    {
        return $this->sujet;
    }

    /**
     * Set contenu
     *
     * @param string $contenu
     *
     * @return MessagePrive
     */
    public function setContenu($contenu)
    {
        $this->contenu = $contenu;

        return $this;
    }

    /**
     * Get contenu
     *
     * @return string
     */
    public function getContenu()
    {
        return $this->contenu;
    }

    /**
     * Set dateMessaPrive
     *
     * @param \DateTime $dateMessaPrive
     *
     * @return MessagePrive
     */
    public function setDateMessaPrive($dateMessaPrive)
    {
        $this->dateMessaPrive = $dateMessaPrive;

        return $this;
    }

    /**
     * Get dateMessaPrive
     *
     * @return \DateTime
     */
    public function getDateMessaPrive()
    {
        return $this->dateMessaPrive;
    }
}

