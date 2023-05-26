<?php

namespace App\Controller;

use App\Repository\SalleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SallesController extends AbstractController
{
    #[Route('/salles', name: 'salles', methods: ['GET'])]
    public function index(SalleRepository $salles): Response
    {
        return $this->render('salles/salles.html.twig', [
            'controller_name' => 'SallesController',
            'salles' => $salles->findAll(),
            // dd($projects->findAll())
        ]);
    }
}