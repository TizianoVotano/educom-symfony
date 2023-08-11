<?php

namespace App\Service;

use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Optreden;
use App\Entity\Artiest;
use App\Entity\Poppodium;

use App\Repository\ArtiestRepository;
use App\Repository\PoppodiumRepository;
use App\Repository\OptredenRepository;


class ArtiestService {

    /** @var ArtiestRepository $artiestRepository */    
    private $artiestRepository;

    public function __construct(EntityManagerInterface $em) {
        $this->artiestRepository = $em->getRepository(Artiest::class);
    }

    private function fetchArtiest($id = null) {
        if(is_null($id)) return(null);
        return($this->artiestRepository->fetchArtiest($id));
    }

    public function saveArtiest($params = null) {
        if ($params === null) {
            $params = [
                "naam" => "Ed Sheeran",
                "genre" => "Pop?",
                "omschrijving" => "GG: Ginger Genius",
                "afbeelding_url" => "https://i.guim.co.uk/img/media/e712b2a9c1a544e012b79afd53f8a571ccd33189/423_127_3548_2127/master/3548.jpg?width=1200&height=1200&quality=85&auto=format&fit=crop&s=a18a5822e74e9be0abb8da688cb2d3e3",
                "website" => "https://melkweg.nl"
            ];
        }
        
        $result = $this->artiestRepository->saveArtiest($params);
        return($result);
    }
}