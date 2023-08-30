<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EmployerController extends AbstractController
{
    #[Route('/profile', name: 'employer_profile')]
    public function profile(): Response
    {
        $data = $this->getUser();
        return $this->render('employer/profile.html.twig', [
            'controller_name' => 'EmployerController',
            'data' => $data
        ]);
    }
    #[Route('/overview', name: 'employer_overview')]
    public function overview(): Response
    {
        return $this->render('employer/overview.html.twig', [
            'controller_name' => 'EmployerController',
        ]);
    }
}
