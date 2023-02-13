<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AuteurController extends AbstractController
{
    #[Route('/auteur', name: 'app_auteur')]
    public function index(): Response
    {
        $auteurs = [];
        return $this->render('auteur/index.html.twig', [
            "auteurs" => $auteurs
        ]);
    }
}
