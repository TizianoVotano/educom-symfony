<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EmployerController extends AbstractController
{
    #[Route('/profile', name: 'app_employer')]
    public function profile(): Response
    {
        return $this->render('employer/profile.html.twig', [
            'controller_name' => 'EmployerController',
        ]);
    }
    #[Route('/overview', name: 'app_employer')]
    public function overview(): Response
    {
        return $this->render('employer/overview.html.twig', [
            'controller_name' => 'EmployerController',
        ]);
    }
}
