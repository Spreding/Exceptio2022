<?php

namespace App\Controller;
use App\Entity\PhraseAccueil;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{

    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }


    #[Route('/login', name: 'app_login')]
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        $phrasearray = $this->entityManager->getRepository(PhraseAccueil::class)->findAll();

        $selectedphrase = $phrasearray[array_rand($phrasearray)];
        
        return $this->render('security/login.html.twig',[
            'error' => $authenticationUtils->getLastAuthenticationError(),
            'Phrase' => $selectedphrase
        ]);
    }

    #[Route('/logout', name: 'app_logout')]
    public function logout()
    {
        throw new \Exception('logout() should never be reached.');
    }
}
