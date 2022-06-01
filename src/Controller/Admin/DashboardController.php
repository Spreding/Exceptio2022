<?php

namespace App\Controller\Admin;

use App\Entity\Client;
use App\Entity\Image;
use App\Entity\ImageCategory;
use App\Entity\PhraseAccueil;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\UserMenu;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;


class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        //return parent::index();
        return $this->render('admin/index.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->renderSidebarMinimized(false)
            ->setTitle('Exceptio2022 - Admin');

    }

    public function configureUserMenu(UserInterface $user): UserMenu
    {

        return parent::configureUserMenu($user);

    }


    public function configureMenuItems(): iterable
    {
        return[
            MenuItem::linkToDashboard('Dashboard', 'fa fa-home'),
            MenuItem::linkToCrud('Client','fa fa-user',Client::class),
            MenuItem::linkToCrud('Phrase Accueil','fas fa-comments',PhraseAccueil::class),
            MenuItem::linkToCrud('Image','fa fa-image',Image::class),
            MenuItem::linkToCrud('Image Category','fa fa-image',ImageCategory::class)
        ];

    }
}
