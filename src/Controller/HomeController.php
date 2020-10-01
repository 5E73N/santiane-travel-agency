<?php

namespace App\Controller;

use App\Repository\TravelRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * index
     * @Route("/", name="home.index")
     * @return Response
     */
    public function index(TravelRepository $travel): Response
    {
        return $this->render('index.html.twig');
    }
}
