<?php

namespace App\Services;

use App\Entity\Image;
use Doctrine\ORM\EntityManagerInterface;

class ArrayImg
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function generateArrayImage(string $categorie=null){
        $ImagesVertical = $this->entityManager->getRepository(Image::class)->findBySizeAndCategorie('vertical',$categorie);
        $ImagesHorizontal =  $this->entityManager->getRepository(Image::class)->findBySizeAndCategorie('horizontal',$categorie);
        $ImagesSquare =  $this->entityManager->getRepository(Image::class)->findBySizeAndCategorie('square',$categorie);

        $ImagesVerticalRand = array_rand($ImagesVertical, 2);
        $ImagesHorizontalRand = array_rand($ImagesHorizontal, 4);
        $ImagesSquareRand = array_rand($ImagesSquare, 7);
        return [
            1 => $ImagesVertical[$ImagesVerticalRand[0]],
            2 => $ImagesHorizontal[$ImagesHorizontalRand[0]],
            3 => $ImagesSquare[$ImagesSquareRand[0]],
            4 => $ImagesVertical[$ImagesVerticalRand[1]],
            5 => $ImagesSquare[$ImagesSquareRand[1]],
            6 => $ImagesSquare[$ImagesSquareRand[2]],
            7 => $ImagesHorizontal[$ImagesHorizontalRand[1]],
            8 => $ImagesHorizontal[$ImagesHorizontalRand[2]],
            9 => $ImagesSquare[$ImagesSquareRand[3]],
            10 => $ImagesSquare[$ImagesSquareRand[4]],
            11 => $ImagesSquare[$ImagesSquareRand[5]],
            12 => $ImagesSquare[$ImagesSquareRand[6]],
            13 => $ImagesHorizontal[$ImagesHorizontalRand[3]]
        ];
    }
}