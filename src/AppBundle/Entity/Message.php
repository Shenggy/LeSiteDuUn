<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Message
 *
 * @ORM\Table(name="message")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\MessageRepository")
 */
class Message
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
     * @ORM\Column(name="Contenu", type="text")
     */
    private $contenu;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateMessage", type="datetimetz")
     */
    private $dateMessage;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Thread")
     * @ORM\JoinColumn(name="thread_id", referencedColumnName="id", onDelete="CASCADE")
     */
    private $thread;

    public function _construct() {
        $this->dateMessage = new \DateTime();
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
     * Set contenu
     *
     * @param string $contenu
     *
     * @return Message
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
     * Set dateMessage
     *
     * @param \DateTime $dateMessage
     *
     * @return Message
     */
    public function setDateMessage($dateMessage)
    {
        $this->dateMessage = $dateMessage;

        return $this;
    }

    /**
     * Get dateMessage
     *
     * @return \DateTime
     */
    public function getDateMessage()
    {
        return $this->dateMessage;
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
    public function getThread()
    {
        return $this->thread;
    }

    /**
     * @param mixed $thread
     */
    public function setThread($thread)
    {
        $this->thread = $thread;
    }
}

