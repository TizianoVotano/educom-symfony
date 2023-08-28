<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class OverviewController extends AbstractController
{
    #[Route('/overview', name: 'app_overview')]
    public function index(): Response
    {
        $this->denyAccessUnlessGranted('ROLE_CANDIDATE', null, 'User tried to access a page without having ROLE_ADMIN');
        return $this->render('overview/index.html.twig', [
            'controller_name' => 'OverviewController',
        ]);
    }
}
