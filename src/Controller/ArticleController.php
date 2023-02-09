<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route("/admin/article/")]
class ArticleController extends AbstractController{

     /**
      * @Route("liste", name= "article")
      */
     public function hello(){
        //  return $this->redirectToRoute('date');
        
          return new Response("Liste des articles");
     }

}