<?php

namespace App\Controller;

use App\Entity\Image;
use App\Entity\PhraseAccueil;
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


        $phrasearray = $this->entityManager->getRepository(PhraseAccueil::class)->findAll();

        $selectedphrase = $phrasearray[array_rand($phrasearray)];


        return $this->render('accueil/index.html.twig', [
            'Images' => $arrayImg->generateArrayImage(null,44),
            'Phrase' => $selectedphrase,

        ]);

    }


    

  

}


