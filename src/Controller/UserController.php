<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Repository\UserRepository;

class UserController extends AbstractController
{
    #[Route('/user', name: 'app_user')]

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/', name: 'app_user_index' ,methods: ['GET'])]
    public function index(UserRepository $userRepository): Response
    {
        dump($userRepository->findAll());

        return $this->render('user/index.html.twig', [
            'users' => $userRepository->findAll(),
        ]);
    }
}
