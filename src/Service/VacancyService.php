<?php

namespace App\Service;

use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Vacancy;
use App\Entity\User;
use App\Service\UserService;

class VacancyService {
    private $vacancyRepository; 
    private $userRepository;

    private $userService;

    public function __construct(EntityManagerInterface $em, UserService $userService) {
        $this->vacancyRepository = $em->getRepository(Vacancy::class);
        $this->userRepository = $em->getRepository(User::class);
        $this->userService = $userService;
    }

    public function getVacancy($id = null) {
        $company = $this->getCompany();
        $vac = $this->vacancyRepository->findById($id);
        $vacancies = $this->vacancyRepository->getAllVacancies();
        
        return $vacancies;
    }

    private function getCompany() {
        $query = $this->userRepository->createQuery(
            'SELECT o
             FROM App\Entity\User o
             WHERE o.id = :id
             ORDER BY o.id ASC'
        )->setParameter('id', 1);
        
        $data = $query->execute();
        
        return($data);
    }

}