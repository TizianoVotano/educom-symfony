<?php

// namespace App\Service;

// use Doctrine\ORM\EntityManagerInterface;
// use App\Entity\Vacancy;
// use App\Entity\User;

// class UserService {
//     private $vacancyRepository; 
//     private $userRepository;

//     public function __construct(EntityManagerInterface $em) {
//         $this->vacancyRepository = $em->getRepository(Vacancy::class);
//         $this->userRepository = $em->getRepository(User::class);
//     }

//     public function getCompany($id) {
//         if (!$id) $id = 1;
//         return $this->userRepository->getCompany($id);
//     }
// }