<?php
namespace AppBundle\Controller;

use AppBundle\Form\ThreadType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Thread;
use Symfony\Component\HttpFoundation\Response;

class ThreadController extends Controller {

    /**
     * @Route("/addThread", name="addThread")
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */

    public function addThread() {
        $thread = new Thread();
        $form = $this->createForm(ThreadType::class, $thread);
        $formView = $form->createView(); //On crée la vue
        return $this->render('threadAdd.html.twig', array('form'=>$formView)); //On l'affiche
    }

    /**
     * @Route("/thread/{id}", name="thread", requirements={"id"="\d+"})
     */
    public function getThread($id) {
        $thread = $this->getDoctrine()
            ->getRepository('AppBundle:Thread')
            ->find($id);
        if(!$thread) {
            //Pas de thread (exception?)
            return new Response("Le sujet n'existe pas"); //TODO --> REMPLACER PAR LA VUE ERREUR
        }
        else {
            return new Response($thread->getNomThread()); //TODO --> REMPLACER PAR LA VUE DU THREAD
        }
    }
}