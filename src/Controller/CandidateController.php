<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class CandidateController extends AbstractController
{
    #[Route('/candidate/profile', name: 'app_candidate')]
    public function profile(): Response
    {
        return $this->render('candidate/profile.html.twig', [
            'controller_name' => 'CandidateController',
        ]);
    }
    
    #[Route('/candidate/overview', name: 'app_candidate')]
    public function overview(): Response
    {
        return $this->render('candidate/overview.html.twig', [
            'controller_name' => 'CandidateController',
        ]);
    }
}
