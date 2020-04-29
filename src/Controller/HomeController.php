<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class HomeController extends AbstractController {

    /**
     * @Route("/hello/{prenom}", name="hello")
     * Montre la page qui dit bonjour
     * 
     * @return void
     */
    public function hello($prenom = "anonyme"){
        return new Response("Bonjour ". $prenom);
    }

    /**
     * @Route("/", name="homepage")
     */
    public function home(){
        return $this->render('home.html.twig');
    }
}