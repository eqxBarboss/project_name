<?php

namespace App\Controller;

use App\Repository\ImageRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/galery", name="galery.")
 */
class GaleryController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index(ImageRepository $imageRepository)
    {
        $images = $imageRepository->findAll();
        $triplets = array_chunk($images, 3);

        return $this->render('galery/index.html.twig', [
            'controller_name' => 'GaleryController',
            'triplets' => $triplets,
        ]);
    }
}
