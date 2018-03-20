<?php
namespace AppBundle\Controller;

use AppBundle\Entity\Message;
use AppBundle\Form\MessageType;
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

    public function addThread(Request $request) {
        $em = $this->getDoctrine()->getManager();

        $form1 = $this->createForm(ThreadType::class);
        $form2 = $this->createForm(MessageType::class);
        $form1->handleRequest($request);
        $form2->handleRequest($request);
        //$form1v = $form1->createView();
        //$form2v = $form2->createView();

       // $form1->bind($request);
       // $form2->bind($request);

        //$form = $this->createForm(ThreadType::class);
        //$form->handleRequest($request);
        $user = $this->getUser();
        if(($form1->isSubmitted() && $form2->isValid()) && (($form2->isSubmitted() && $form2->isValid()))) {
            $thread = new Thread();
            $message = new Message();
            $thread = $form1->getData();
            $message = $form2->getData();
            //TODO GERER ERREUR SI USER PAS CO
            $thread->setUser($user);
            $message->setUser($user);
            $message->setThread($thread);
            $em->persist($thread);
            $em->persist($message);
            $em->flush();
            return $this->redirectToRoute('getMessagesThread', array('threadID'=>$thread->getId()));
        }
        //$formView = $form->createView(); //On crée la vue
        $form1v = $form1->createView();
        $form2v = $form2->createView();
        return $this->render('threadAdd.html.twig', array('form1'=>$form1v, 'form2'=>$form2v)); //On l'affiche
    }

    /**
     * @Route("/forum", name="findAll")
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */

    public function findAll()
    {
        $entityManager = $this->getDoctrine()->getManager();
        $threads = $entityManager->getRepository(Thread::class)->findAll();

        $repository = $this->getDoctrine()->getRepository(Thread::class);
        $threads = $repository->findAll();

        return $this->render('forum/forum.html.twig', array('threads' => $threads));
    }

}