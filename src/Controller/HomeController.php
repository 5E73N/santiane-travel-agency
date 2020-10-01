<?php

namespace App\Controller;

use App\Entity\Voyage1;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{    
    /**
     * index
     * @Route("/", name="home")
     * @return Response
     */
    public function index(): Response
    {
        return $this->render('index.html.twig');
    }
}