<?php

namespace App\Service;

use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Poppodium;
use App\Repository\PoppodiumRepository;


class PoppodiumService {
    
    private $poppodiumRepository;

    public function __construct(EntityManagerInterface $em) {
        $this->poppodiumRepository = $em->getRepository(Poppodium::class);
    }

    public function savePodium($params = null) {
        if ($params === null) {
            $params = [
                "naam" => "De Melkweg",
                "adres" => "Lijnbaansgracht 234a",
                "postcode" => "1017PH",
                "woonplaats" => "Amsterdam",
                "telefoonnummer" => "020-5318181",
                "email" => "info@melkweg.nl",
                "website" => "https://melkweg.nl"
            ];
        }
        $this->poppodiumRepository->savePodium($params);
        return($params);
    }
}