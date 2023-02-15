<?php

namespace App\Controller;

use App\Entity\Auteur;
use App\Form\AuteurType;
use App\Repository\AuteurRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AuteurController extends AbstractController
{
    #[Route('/auteur', name: 'app_auteur')]
    public function index(AuteurRepository $auteurRepo, Request $request, AuteurRepository $repo): Response
    {     
        $auteur = new Auteur;
        $form = $this->createForm(AuteurType::class, $auteur);
        $form->handleRequest($request);
   
        if( $form->isSubmitted() && $form->isValid() ){
            $auteur->setDateAjout(new \DateTimeImmutable());
            
            $repo->save($auteur, true);

            $this->addFlash("success", "L'auteur a bien été ajouté ! ");

            return $this->redirectToRoute("app_auteur");
        }

        return $this->render('auteur/index.html.twig', [
            "auteurs" => $auteurRepo->findAll(),
            "form" => $form->createView()
        ]);
    }

    #[Route('/auteur/{id}', name: "app_auteur_show")]
    public function show(Auteur $auteur){
        return $this->render("auteur/show.html.twig", ["auteur" => $auteur]);
    }

    #[Route('/delete/{id}', name: "app_auteur_delete")]
    public function delete(Auteur $auteur, AuteurRepository $repo){
        $repo->remove($auteur, true);
        return $this->redirectToRoute('app_auteur');
    }
}
