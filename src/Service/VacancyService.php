<?php

// namespace App\Service;

// use Doctrine\ORM\EntityManagerInterface;
// use App\Entity\Vacancy;
// use App\Entity\User;
// use App\Service\UserService;

// class VacancyService {
//     private $vacancyRepository; 
//     private $userRepository;

//     private $userService;

//     public function __construct(EntityManagerInterface $em, UserService $userService) {
//         $this->vacancyRepository = $em->getRepository(Vacancy::class);
//         $this->userRepository = $em->getRepository(User::class);
//         $this->userService = $userService;
//     }

//     public function getVacancy($id = null) {
//         $vacancies = $this->vacancyRepository->getAllVacancies();
        
//         return $vacancies;
//     }

//}