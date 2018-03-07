<?php
namespace AppBundle\Controller;

use AppBundle\AppBundle;
use AppBundle\Entity\Message;
use AppBundle\Entity\Thread;
use AppBundle\Form\MessageType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\HttpFoundation\Response;

class MessageController extends Controller {

    /**
    * @Route("/thread/{threadID}/addMessage", name="addMessage")
    * @ParamConverter("thread", options={"mapping": {"threadID" : "id"}})
    *
    */

    public function addMessage() {
        $thread = new Message();
        $form = $this->createForm(MessageType::class, $thread);
        $formView = $form->createView(); //On crée la vue
        return $this->render('messageAdd.html.twig', array('form'=>$formView)); //On l'affiche
    }

    /**
     * @Route("/thread/{threadID}", name="getMessagesThread")
     * @ParamConverter("thread", options={"mapping": {"threadID" : "id"}})
     */

    public function getMessagesThread(Thread $threadID) {
        $messages = $this->getDoctrine()
            ->getRepository('AppBundle:Message')->findBy([
                "thread" => $threadID
            ]);
        return $this->render("listeMessages.html.twig", array('messages' => $messages));
    }
}