<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class MaisonController extends Controller
{
    /**
     * @Route("/maisons", name="listerMaisons")
     */
    public function indexAction()
    {
        // récupérer l'entity manager : la connexion à la BDD
        $em=$this->getDoctrine()->getManager();
        $maisons=$em->getRepository("AppBundle:Maison")->findAll();
        // replace this example code with whatever you need
        return $this->render('Maison/index.html.twig',["maisons"=>$maisons]);
    }
}
