<?php

namespace App\Controller;

use App\Repository\ProfileRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AppController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(ProfileRepository $profileRepository): Response
    {
        return $this->render('app/index.html.twig', [
            'profile' => $profileRepository->find(1),
        ]);
    }
}
