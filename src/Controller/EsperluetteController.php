<?php

namespace App\Controller;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\PhraseAccueil;
use App\Services\ArrayImg;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EsperluetteController extends AbstractController
{

    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/esperluette', name: 'app_esperluette')]
    public function index(ArrayImg $arrayImg): Response
    {

        $phrasearray = $this->entityManager->getRepository(PhraseAccueil::class)->findAll();

        $selectedphrase = $phrasearray[array_rand($phrasearray)];

        return $this->render('esperluette/index.html.twig', [
            'Images' => $arrayImg->generateArrayImage(),
            'Phrase' => $selectedphrase
        ]);
    }
}
