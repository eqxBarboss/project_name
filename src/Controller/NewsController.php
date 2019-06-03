<?php

namespace App\Controller;

use App\Repository\PostRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/news", name="news.")
 */
class NewsController extends AbstractController
{

    /**
     * @Route("/", name="index")
     */
    public function index(PostRepository $postRepository, UserRepository $userRepository)
    {
        $authors = [];
        $posts = $postRepository->findAll();
        foreach ($posts as $post) {
            $authors[$post->getId()] = $userRepository->findOneBy(['id' => $post->getUserId()]);
        }

        $user = $this->getUser();

        return $this->render('news/index.html.twig', [
            'controller_name' => 'NewsController',
            'posts' => $posts,
            'authors' => $authors,
            'user' => $user,
        ]);
    }
}