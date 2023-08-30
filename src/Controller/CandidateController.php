<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class CandidateController extends AbstractController
{
    #[Route('/candidate/profile', name: 'candidate_profile')]
    public function profile(): Response
    {
        $data = $this->getUser();
        return $this->render('candidate/profile.html.twig', [
            'controller_name' => 'CandidateController',
            'data' => $data
        ]);
    }
    
    #[Route('/candidate/overview', name: 'candidate_overview')]
    public function overview(): Response
    {
        $data = $this->getUser();
        return $this->render('candidate/overview.html.twig', [
            'controller_name' => 'CandidateController',
            'data' => $data,
        ]);
    }
}
