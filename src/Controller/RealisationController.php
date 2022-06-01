<?php

namespace App\Controller;
use App\Entity\PhraseAccueil;
use App\Entity\Client;
use App\Services\ArrayImg;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RealisationController extends AbstractController
{

    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @Route("/realisation", name="app_realisation")
     */
//    #[Route('/realisation', name: 'app_realisation')]
    public function index(): Response
    {
        $phrasearray = $this->entityManager->getRepository(PhraseAccueil::class)->findAll();

        $selectedphrase = $phrasearray[array_rand($phrasearray)];

        return $this->render('realisation/index.html.twig', [
            'controller_name' => 'RealisationController',
            'Phrase' => $selectedphrase
        ]);
    }

    #[Route('/realisation/conseil', name: 'app_conseil')]
    public function conseil(ArrayImg $arrayImg): Response
    {
        $phrasearray = $this->entityManager->getRepository(PhraseAccueil::class)->findAll();

        $selectedphrase = $phrasearray[array_rand($phrasearray)];

        return $this->render('conseil/index.html.twig', [
            'Images' => $arrayImg->generateArrayImage('conseil'),
            'Phrase' => $selectedphrase
        ]);
    }

    #[Route('/realisation/graphisme-communication', name: 'app_graphisme_communication')]
    public function graphisme(ArrayImg $arrayImg): Response
    {
        $phrasearray = $this->entityManager->getRepository(PhraseAccueil::class)->findAll();

        $selectedphrase = $phrasearray[array_rand($phrasearray)];

        return $this->render('graphisme_communication/graphisme_communication.html.twig', [
            'Images' => $arrayImg->generateArrayImage('communication'),
            'Phrase' => $selectedphrase
        ]);
    }

    #[Route('/realisation/illustration', name: 'app_illustration')]
    public function illustration(ArrayImg $arrayImg): Response
    {
        $phrasearray = $this->entityManager->getRepository(PhraseAccueil::class)->findAll();

        $selectedphrase = $phrasearray[array_rand($phrasearray)];

        return $this->render('illustration/illustration.html.twig', [
            'Images' => $arrayImg->generateArrayImage('illustration'),
            'Phrase' => $selectedphrase
        ]);
    }

    #[Route('/realisation/audiovisuel', name: 'app_audiovisuel')]
    public function audiovisuel(ArrayImg $arrayImg): Response
    {
        $phrasearray = $this->entityManager->getRepository(PhraseAccueil::class)->findAll();

        $selectedphrase = $phrasearray[array_rand($phrasearray)];

        return $this->render('audiovisuel/audiovisuel.html.twig', [
            'Images' => $arrayImg->generateArrayImage('photo'),
            'Phrase' => $selectedphrase
        ]);
    }


    #[Route('/realisation/confiance', name: 'app_confiance')]
    public function confiance(): Response
    {
        $clients = $this->entityManager->getRepository(Client::class)->findBy([], ['id' => 'ASC']);
        
        $phrasearray = $this->entityManager->getRepository(PhraseAccueil::class)->findAll();

        $selectedphrase = $phrasearray[array_rand($phrasearray)];
        

        return $this->render('confiance/index.html.twig', [
            'clients' => $clients,
            'Phrase' => $selectedphrase
        ]);
    }


}
