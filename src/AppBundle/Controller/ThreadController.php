<?php
namespace AppBundle\Controller;

use AppBundle\Form\ThreadType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Thread;

class ThreadController extends Controller {

    /**
     * @Route("/addThread", name="addThread")
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */

    public function addAction() {
        $thread = new Thread();
        $form = $this->createForm(ThreadType::class, $thread);
        $formView = $form->createView(); //On crée la vue
        return $this->render('threadAdd.html.twig', array('form'=>$formView)); //On l'affiche
    }

    /**
     * @Route("/findAll", name="findAll")
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */

    public function findAll(){
        $entityManager = $this->getDoctrine()->getManager();
        $threads = $entityManager->getRepository(Thread::class)->findAll();

        /**
        $repository = $this->getDoctrine()->getRepository(Thread::class);
        $threads = $repository->findAll();
        **/
        return $this->render('forum/forum.html.twig', array('threads'=>$threads));
    }
}