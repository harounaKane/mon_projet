<?php

namespace App\Controller;

use App\Entity\Auteur;
use App\Repository\AuteurRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

class AuteurController extends AbstractController
{
    #[Route('/auteur', name: 'app_auteur')]
    public function index(AuteurRepository $auteurRepo): Response
    {     
        return $this->render('auteur/index.html.twig', [
            "auteurs" => $auteurRepo->findAll()
        ]);
    }

    #[Route('/auteur/{id}', name: "app_auteur_show")]
    public function show(Auteur $auteur){
        return $this->render("auteur/show.html.twig", ["auteur" => $auteur]);
    }

    /**
     * @Route("/auteur/new", name="app_auteur_new")
     */
    public function new(){

        dump(555);
        return $this->render("auteur/new.html.twig");

      //  return $this->redirectToRoute('app_auteur');
    }

    #[Route('/delete/{id}', name: "app_auteur_delete")]
    public function delete(Auteur $auteur, AuteurRepository $repo){
        $repo->remove($auteur, true);
        return $this->redirectToRoute('app_auteur');
    }
}
