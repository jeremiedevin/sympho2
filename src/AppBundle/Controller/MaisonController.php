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
    
    /**
     * @Route("/maisons/ajouter", name="ajouterMaison")
     */
    public function ajouterAction(Request $request){
        // je crée un objet vide
        $maison=new \AppBundle\Entity\Maison();
        
        // je crée au formulaire pour cet objet
        $form=$this->createForm(\AppBundle\Form\MaisonType::class, $maison);
        
        // traitement du retour
        if ($form->handleRequest($request)->isValid()) {
            $em=$this->getDoctrine()->getManager();
            $em->persist($maison);
            $em->flush();
            
            $this->addFlash('notice', "La maison ".$maison->getNom()." a bien été ajoutée.");
            return $this->redirectToRoute("listerMaisons");
        }
        
        // ici je gérerai le retour en POST...
        return $this->render("Maison/ajouter.html.twig",
                ["formulaire"=>$form->createView()]);
    }
    
    /**
     * @Route("/maisons/modifier/{id}", name="modifierMaison"
     * , requirements={
     * "id":"\d+"
     * })
     */
    public function modifierAction($id,Request $request){
        // je récupère l'objet
        $em=$this->getDoctrine()->getManager();
        $maison=$em->getRepository("AppBundle:Maison")
                ->find($id);
        
        if ($maison==null) {
            throw new \Symfony\Component\HttpKernel\Exception\NotFoundHttpException("La maison n'existe pas");
        }
        
        // je crée au formulaire pour cet objet
        $form=$this->createForm(\AppBundle\Form\MaisonType::class, $maison);
        
        // traitement du retour
        if ($form->handleRequest($request)->isValid()) {
            $em=$this->getDoctrine()->getManager();
            $em->persist($maison);
            $em->flush();
            
            $this->addFlash('notice', "La maison ".$maison->getNom()." a bien été ajoutée.");
            return $this->redirectToRoute("listerMaisons");
        }
        
        // ici je gérerai le retour en POST...
        return $this->render("Maison/ajouter.html.twig",
                ["formulaire"=>$form->createView()]);
        
    }
    
}
