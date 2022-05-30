<?php

namespace App\Controller;

use App\Services\ArrayImg;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EsperluetteController extends AbstractController
{
    #[Route('/esperluette', name: 'app_esperluette')]
    public function index(ArrayImg $arrayImg): Response
    {

        return $this->render('esperluette/index.html.twig', [
            'Images' => $arrayImg->generateArrayImage()
        ]);
    }
}
