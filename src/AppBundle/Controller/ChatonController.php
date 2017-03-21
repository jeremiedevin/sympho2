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
    
    /**
     * @Route("/chatons/ajouter", name="ajouterChaton")
     */
    public function ajouterAction(Request $request){
        // je crée un objet vide
        $chaton=new \AppBundle\Entity\Chaton();
        
        // je crée au formulaire pour cet objet
        $form=$this->createForm(\AppBundle\Form\ChatonType::class, $chaton);
        
        // traitement du retour
        if ($form->handleRequest($request)->isValid()) {
            $em=$this->getDoctrine()->getManager();
            $em->persist($chaton);
            $em->flush();
            
            $this->addFlash('notice', "Le chaton ".$chaton->getNom()." a bien été ajouté.");
            return $this->redirectToRoute("listerChatons");
        }
        
        // ici je gérerai le retour en POST...
        return $this->render("Chaton/ajouter.html.twig",
                ["formulaire"=>$form->createView()]);
    }
    
    
    /**
     * @Route("/chatons/modifier/{id}", name="modifierChaton"
     * , requirements={
     * "id":"\d+"
     * })
     */
    public function modifierAction($id,Request $request){
        // je récupère l'objet
        $em=$this->getDoctrine()->getManager();
        $chaton=$em->getRepository("AppBundle:Chaton")
                ->find($id);
        
        if ($chaton==null) {
            throw new \Symfony\Component\HttpKernel\Exception\NotFoundHttpException("La chaton n'existe pas");
        }
        
        // je crée au formulaire pour cet objet
        $form=$this->createForm(\AppBundle\Form\ChatonType::class, $chaton);
        
        // traitement du retour
        if ($form->handleRequest($request)->isValid()) {
            $em=$this->getDoctrine()->getManager();
            $em->persist($chaton);
            $em->flush();
            
            $this->addFlash('notice', "Le chaton ".$chaton->getNom()." a bien été modifié.");
            return $this->redirectToRoute("listerChatons");
        }
        
        // ici je gérerai le retour en POST...
        return $this->render("Chaton/modifier.html.twig",
                ["formulaire"=>$form->createView()]);
        
    }
    
}
