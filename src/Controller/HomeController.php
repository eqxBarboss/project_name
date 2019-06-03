<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\PostRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/home", name="home.")
 */
class HomeController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index()
    {
        $user = $this->getUser();

        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'PROJECT_NAME' => "project_name",
            'user' => $user,
        ]);
    }
}