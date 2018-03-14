<?php


namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class contactPage extends Controller
{
    /**
     * @Route("/contact", name="contactpage")
     */
    public function contactpage()
    {
        $name = "contactpage";
        return $this->render('contact/contact.html.twig', array('name'=>$name));
    }
}