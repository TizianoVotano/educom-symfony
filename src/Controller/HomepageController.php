<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\VacancyService;
use App\Service\UserService;


#[Route('/')]
class HomepageController extends AbstractController
{
    private $vacancyService;

    public function __construct(VacancyService $vacancyService) {
        $this->vacancyService = $vacancyService;
    }

    #[Route('/', name: 'homepage')]
    public function index(): Response
    {
        $data = $this->vacancyService->getVacancy();
        return $this->render('homepage/index.html.twig', [
            'controller_name' => 'HomepageController',
            'data' => $data
        ]);
    }
}
