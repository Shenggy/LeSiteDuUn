<?php
namespace AppBundle\Controller;

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
        $message = new Message();
        $form = $this->createForm(MessageType::class, $message);
        $formView = $form->createView(); //On crée la vue
        return $this->render('messageAdd.html.twig', array('form'=>$formView)); //On l'affiche
    }

    /**
    * @Route("/thread/{threadID}/getAllMessagesFromThread", name="getAllMessagesFromThread")
    * @ParamConverter("thread", options={"mapping": {"threadID" : "id"}})
     */

    public function getAllMessagesFromThread(Thread $threadId) {
        //A modifier... cet affichage devrait se faire sur l'affichage d'un sujet (/thread)
        $em = $this->container->get("doctrine.orm.default_entity_manager");
        $entities = $em->getRepository(Message::class)->findBy([
            "thread_id" => $threadId,
        ]);
        return new Response("pas maintenant");
    }
}