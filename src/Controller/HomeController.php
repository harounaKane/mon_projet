<?php

namespace App\Controller;

use App\services\Capital;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController{

     /**
      * @Route("/hello/{prenom}/{nom}", name= "home")
      */
     public function hello($prenom, $nom, Capital $capital){
        //  return $this->redirectToRoute('date');
        
          return new Response("Hello " . $capital->capitalize($prenom) . " " . $capital->capitalize($nom));
     }

     #[Route("/laDate", name:"date")]
     public function dateJour(){
          return new Response(date("y-d-m"));
     }
     #[Route('/')]
     public function bonjour(){
          dump("toto");
          return new Response("bonjour");
     }
}