<?php

namespace App\Controller;

use App\Repository\TravelRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SingleController extends AbstractController
{
    /**
     * stockholm
     * @Route("/destination/stockholm", name="stockholm.index")
     * @return Response
     */
    public function stockholm(TravelRepository $repository): Response
    {
        $t = $repository->findOneBy(["name" => "voyage1"]);
        $travel = $repository->findBy(["name" => "voyage1"]);
        return $this->render('single.html.twig', [
            'travel' => $travel,
            't' => $t
        ]);
    }

    /**
     * poudlard
     * @Route("/destination/poudlard", name="poudlard.index")
     * @return Response
     */
    public function poudlard(TravelRepository $repository): Response
    {
        $t = $repository->findOneBy(["name" => "voyage2"]);
        $travel = $repository->findBy(["name" => "voyage2"]);
        return $this->render('single.html.twig', [
            'travel' => $travel,
            't' => $t
        ]);
    }
}