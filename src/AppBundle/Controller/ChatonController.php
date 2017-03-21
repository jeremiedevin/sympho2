<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ChatonController extends Controller
{
    /**
     * @Route("/chatons", name="listerChatons")
     */
    public function indexAction()
    {
        $em=$this->getDoctrine()->getManager();
        $chatons=$em->getRepository("AppBundle:Chaton")->findAll();
        return $this->render('Chaton/index.html.twig',["chatons"=>$chatons]);
    }
    
}
