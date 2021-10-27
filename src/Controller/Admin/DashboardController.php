<?php

namespace App\Controller\Admin;

use App\Entity\Products;
use App\Entity\ProductAttributes;
use App\Entity\Users;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

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
            ->setTitle('Ox Test');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');
         yield MenuItem::linkToCrud('Products', 'fas fa-list', Products::class);
         yield MenuItem::linkToCrud('Attributes', 'fas fa-list', ProductAttributes::class);
         yield MenuItem::linkToCrud('Users', 'fas fa-user', Users::class);
    }
}
