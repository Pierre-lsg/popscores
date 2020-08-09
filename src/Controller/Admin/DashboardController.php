<?php

namespace App\Controller\Admin;

use App\Entity\Club;
use App\Entity\Team;
use App\Entity\Player;
use App\Entity\Season;
use App\Entity\Competition;
use App\Entity\Championship;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        return parent::index();
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Popscores V2');
    }

    public function configureMenuItems(): iterable
    {
        return 
        [
            MenuItem::linkToDashboard('Management', 'fa fa-home'),

            MenuItem::section('Participants'),
            MenuItem::linkToCrud('Clubs', 'fa fa-tags', Club::class),
            MenuItem::linkToCrud('Teams', 'fa fa-file-text', Team::class),
            MenuItem::linkToCrud('Players', 'fa fa-file-text', Player::class),

            MenuItem::section('Championships'),
            MenuItem::linkToCrud('Championships', 'fa fa-tags', Championship::class),
            MenuItem::linkToCrud('Season', 'fa fa-file-text', Season::class),
            MenuItem::linkToCrud('Competition', 'fa fa-file-text', Competition::class),

        ] ;
        // yield MenuItem::linkToCrud('The Label', 'icon class', EntityClass::class);
    }
}
