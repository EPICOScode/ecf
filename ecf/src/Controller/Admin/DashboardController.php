<?php

namespace App\Controller\Admin;

use App\Entity\Ergonomie;
use App\Entity\Logiciels;
use App\Entity\Materiels;
use App\Entity\Reservation;
use App\Entity\Salle;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    public function __construct(private AdminUrlGenerator $adminUrlGenerator)
    {

    }
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        $url = $this->adminUrlGenerator->setController(SalleCrudController::class)->generateUrl();
        return $this->redirect($url);

        // return $this->render('admin/dashboard.html.twig');
    }

    // $url = $this->adminUrlGenerator->setController(SalleCrudController::class)->generateUrl();

    // return $this->redirectToRoute($url);

    // Option 1. You can make your dashboard redirect to some common page of your backend
    //
    //$adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
    //return $this->redirect($adminUrlGenerator->setController(SalleCrudController::class)->generateUrl());

    // Option 2. You can make your dashboard redirect to different pages depending on the user
    //
    // if ('jane' === $this->getUser()->getUsername()) {
    //     return $this->redirect('...');
    // }

    // Option 3. You can render some custom template to display a proper dashboard with widgets, etc.
    // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
    //


    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Projetecf');

    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::section('Salles', 'fas fa-handshake');
        yield MenuItem::subMenu('Items', 'fas fa-add')->setSubItems([
            MenuItem::linkToCrud('Ergonomie', 'fas fa-microchip', Ergonomie::class),
            MenuItem::linkToCrud('Logicciels', 'fas fa-laptop', Logiciels::class),
            MenuItem::linkToCrud('Materiels', 'fas fa-tools', Materiels::class),
        ]);
        yield MenuItem::section('Reservation', 'fas fa-book');
        yield MenuItem::subMenu('Items', 'fas fa-add')->setSubItems([
            MenuItem::linkToCrud('Reserver une salle', 'fas fa-key', Reservation::class),
            MenuItem::linkToCrud('salle', 'fas fa-table', Salle::class),
            MenuItem::linkToCrud('utilisateur', 'fas fa-user', User::class)
        ]);

        //    yield MenuItem::subMenu('Reservations' , 'fas fa-bars')->setSubItems([
        // ]);
        // yield MenuItem::linkToCrud('Salles', 'fas fa-plus', Salle::class);
        // yield MenuItem::linkToCrud('Reservation', 'fas fa-plus', Reservation::class);
        // yield MenuItem::linkToCrud('Ergonomie', 'fas fa-plus', Ergonomie::class);
        // yield MenuItem::linkToCrud('Logiciels', 'fas fa-plus', Logiciels::class);
        // yield MenuItem::linkToCrud('Materiels', 'fas fa-plus', Materiels::class);


        //    yield MenuItem::section('Salles');
        //    yield MenuItem::section('Demandes en attente');


        // yield MenuItem::linkToCrud('The Label', 'fas fa-list', EntityClass::class);
    }
}