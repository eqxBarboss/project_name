<?php

namespace App\Controller;

use App\Repository\PostRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/profile", name="profile.")
 */
class ProfileController extends AbstractController
{
    /**
     * @Route("/{id?}", name="index")
     */
    public function index(PostRepository $postRepository, UserRepository $userRepository, $id)
    {
        $loggedUser = $this->getUser();
        if (!$loggedUser && !$id) return $this->redirect($this->generateUrl('home.index'));

        $user = $loggedUser;
        if ($id) {
            $user = $userRepository->findOneBy(['id' => $id]);
            if (!$user) {
                return $this->redirect($this->generateUrl('home.index'));
            }
        }

        $posts = $postRepository->findBy(['userId' => $user->getId()]);

        return $this->render('profile/index.html.twig', [
            'controller_name' => 'ProfileController',
            'posts' => $posts,
            'user' => $user,
        ]);
    }

}