<?php


namespace AppBundle\Controller;

use AppBundle\Form\ContactType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class contactPage extends Controller
{
    /**
     * @Route("/contact", name="contactpage")
     */
    public function contactpage(Request $request)
    {

        $form = $this->createForm(ContactType::class);

        if ($request->isMethod('POST')) {
            // Refill the fields in case the form is not valid.
            $form->handleRequest($request);

            if ($form->isValid()) {
                // Send mail
                if ($this->sendEmail($form->getData())) {

                    // Everything OK, redirect to wherever you want ! :
                    return $this->redirectToRoute('contactpage');
                }
            } else {
                return $this->redirectToRoute('contactpage');
            }
        }
        $name = "contactpage";
        return $this->render('contact/contact.html.twig', array(
            'name'=>$name,
            'contactForm' => $form->createView()));
    }

    private function sendEmail($data){


        $message = (new \Swift_Message($data['objet']))
            ->setFrom('deozza@gmail.com')
            ->setTo('deozza@gmail.com')
            ->setBody(
                '<html>'.
                '<body>'.
                '<p>'.$data["message"].'</p>'.
                '<p>De :'.$data["mail"].'</p>'.
                '</body>'.
                '</html>',
                'text/html');

        $message2 = (new \Swift_Message('Votre mail a bien été envoyé'))
            ->setFrom('deozza@gmail.com')
            ->setTo(array($data['mail']))
            ->setBody(
                '<html>'.
                '<body>'.
                '<p>Merci de nous avoir contacté. Notre équipe vous répondra dans les plus brefs délais.</p>'.
                '<p>Cordialement,</p>'.
                "<p>L'équipe lesiteduun.fr</p>".
                '</body>'.
                '</html>',
                'text/html');

        return array($this->get('mailer')->send($message2), $this->get('mailer')->send($message));
    }
}