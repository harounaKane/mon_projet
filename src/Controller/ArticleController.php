<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArticleController extends AbstractController
{
    #[Route('/', name: 'app_article')]
    public function index(): Response
    {
        $articles = [
            ["id" => 15, "libelle" => "Ordinateur", "prix" => 75, "quantity" => 80],
            ["id" => 16, "libelle" => "clavier", "prix" => 5, "quantity" => 800]
        ];
   
        return $this->render('article/index.html.twig', [
            "articles" => $articles
        ]);
    }

    #[Route('/article/{id}', name: 'app_art')]
    public function article($id){
        $articles = [
            ["id" => 15, "libelle" => "Ordinateur", "prix" => 75, "quantity" => 80],
            ["id" => 16, "libelle" => "clavier", "prix" => 5, "quantity" => 800]
        ];

        $art = [];
        
        foreach($articles as $key => $article){
            if($id == $article['id']){
                $art = $article;
            }
        }

        return $this->render('article/show.html.twig', ["article" => $art]);
    }
}
