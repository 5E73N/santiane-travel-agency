<?php

namespace App\Controller\Admin;

use App\Entity\Travel;
use App\Form\TravelFormType;
use App\Repository\TravelRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminTravelController extends AbstractController
{
    /**
     * repository
     *
     * @var mixed
     */
    private $repository;
    
    /**
     * em
     *
     * @var mixed
     */
    private $em;

    public function __construct(TravelRepository $repository, EntityManagerInterface $em)
    {
        $this->repository = $repository;
        $this->em = $em;
    }

    /**
     * index
     * @Route("/admin", name="admin.index")
     * @return Response
     */
    public function index(): Response
    {
        $travel = $this->repository->findAll();
        
        return $this->render('admin/index.html.twig', [
            'travel' => $travel
        ]);
    }

    /**
     * edit
     * @Route("/admin/edit/{id}", name="admin.edit")
     * @return Response
     */
    public function edit(Travel $travel, Request $request): Response
    {
        $form = $this->createForm(TravelFormType::class, $travel);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $this->em->flush();
            return $this->redirectToRoute("admin.index");
        }

        return $this->render('admin/edit.html.twig',
            [
                'travel' => $travel,
                'form' => $form->createView()
            ]
        );
    }
    
    /**
     * new
     * @Route("/admin/new", name="admin.new")
     * @return Response
     */
    public function new(Request $request): Response
    {
        $travel = new Travel();
        $form = $this->createForm(TravelFormType::class, $travel);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $this->em->persist($travel);
            $this->em->flush();
            return $this->redirectToRoute("admin.index");
        }

        return $this->render('admin/new.html.twig',
        [
            'travel' => $travel,
            'form' => $form->createView()
        ]
    );

    }
}
