<?php

namespace App\Controller;

use App\Entity\Image;
use App\Services\ArrayImg;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AccueilController extends AbstractController
{
    private $entityManager;
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/', name: 'app_accueil')]
    public function index(ArrayImg $arrayImg): Response
    {


        return $this->render('accueil/index.html.twig', [
            'Images' => $arrayImg->generateArrayImage()
        ]);

    }
}


