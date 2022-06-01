<?php

namespace App\Controller;
use App\Entity\PhraseAccueil;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class StudioController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    
    #[Route('/studio', name: 'app_studio')]
    public function index(): Response
    {
        $phrasearray = $this->entityManager->getRepository(PhraseAccueil::class)->findAll();

        $selectedphrase = $phrasearray[array_rand($phrasearray)];
        
        return $this->render('studio/index.html.twig', [
            'controller_name' => 'StudioController',
            'Phrase' => $selectedphrase
        ]);
    }
}
