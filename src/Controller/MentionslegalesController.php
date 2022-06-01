<?php

namespace App\Controller;
use App\Entity\PhraseAccueil;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MentionslegalesController extends AbstractController
{

    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/mentionslegales', name: 'app_mentionslegales')]
    public function index(): Response
    {
        $phrasearray = $this->entityManager->getRepository(PhraseAccueil::class)->findAll();

        $selectedphrase = $phrasearray[array_rand($phrasearray)];

        return $this->render('mentionslegales/index.html.twig', [
            'controller_name' => 'MentionslegalesController',
            'Phrase' => $selectedphrase
        ]);
    }
}
