<?php
namespace AppBundle\Controller;

use AppBundle\Entity\Message;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class MessageController extends Controller {

    /**
     * @Route("/addMessage", name="addMessage")
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */

    public function addAction() {
        $thread = new Message();
        $form = $this->createForm(MessageType::class, $thread);
        $formView = $form->createView(); //On crée la vue
        return $this->render('messageAdd.html.twig', array('form'=>$formView)); //On l'affiche
    }
}