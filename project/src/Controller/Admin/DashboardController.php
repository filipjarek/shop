<?php

namespace App\Controller\Admin;

use App\Entity\User;
use App\Entity\Product;
use App\Entity\Category;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        return $this->render('admin/dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Shop');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoRoute('Back to the website', 'fa-solid fa-arrow-left', 'app_home');
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Users', 'fas fa-users', User::class);
        yield MenuItem::linkToCrud('Products', 'fa-solid fa-boxes-stacked', Product::class);
        yield MenuItem::linkToCrud('Categories', 'fa-solid fa-bars', Category::class);
    }
}
