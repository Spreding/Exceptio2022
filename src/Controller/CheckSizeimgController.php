<?php

namespace App\Controller;

use App\Entity\Image;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CheckSizeimgController extends AbstractController
{

    private $entityManager;
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }


    #[Route('/check_sizeimg', name: 'app_check_sizeimg')]
    public function index(): Response
    {

        $ImagesVertical = $this->entityManager->getRepository(Image::class)->findBy(array('size'=>'vertical'));
        $ImagesHorizontal = $this->entityManager->getRepository(Image::class)->findBy(array('size'=>'horizontal'));
        $ImagesSquare = $this->entityManager->getRepository(Image::class)->findBy(array('size'=>'square'));

        return $this->render('check_sizeimg/index.html.twig', [
            'controller_name' => 'CheckSizeimgController',
            'ImagesVertical' => $ImagesVertical,
            'ImagesHorizontal' => $ImagesHorizontal,
            'v' => $ImagesSquare,

        ]);
    }
}
