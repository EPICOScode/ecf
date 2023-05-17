<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ReservationController extends AbstractController
{
    #[Route('/reservation', name: 'reservation')]
    public function reserver($id): Response
    {
        // Code pour gérer la réservation de la salle avec l'ID donné

        return $this->render('reservation/index.html.twig', [
            'id' => $id,
        ]);
    }
}