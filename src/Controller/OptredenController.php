<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\Artiest;
use App\Entity\Poppodium;
use App\Entity\Optreden;
use App\Repository\OptredenRepository;
use Doctrine\Persistence\ManagerRegistry;

#[Route('/optreden')]
class OptredenController extends BaseController
{
    //$doctrine = null;

    #[Route('/save', name: 'optreden_save')]
    public function saveOptreden() : Response {
        $doctrine = $this->doctrine();

        /** @var OptredenRepository $rep */
        $rep = $doctrine->getRepository(Optreden::class);

        /// Ook hier weer een kleine simulatie van een "POST" request
        $optreden = [
            "poppodium_id" => 1,
            "hoofdprogramma_id" => 1, 
            "voorprogramma_id" => 2,
            "omschrijving" => "Een avondje blues uit het boekje...",
            "datum" => "2022-07-14",
            
            /// Prijs altijd in centen wegscrhijven ivm afronding
            "prijs" => 3800,
            
            "ticket_url" => "https://melkweg.nl/ticket/",
            "afbeelding_url" => "https://melkweg.nl/optreden/plaatje.jpg"
        ];

        $result = $rep->saveOptreden($optreden);
        dd($result);

    }

    #[Route('/delete', name: 'optreden_delete')]
    public function deleteOptreden() : Response {
        $doctrine = $this->doctrine();

        /** @var OptredenRepository $rep */
        $rep = $doctrine->getRepository(Optreden::class);

        /// Ook hier weer een kleine simulatie van een "POST" request
        $optreden = [
            "poppodium_id" => 1,
            "hoofdprogramma_id" => 1, 
            "voorprogramma_id" => 2,
            "omschrijving" => "Een avondje blues uit het boekje...",
            "datum" => "2022-07-14",
            
            /// Prijs altijd in centen wegscrhijven ivm afronding
            "prijs" => 3800,
            
            "ticket_url" => "https://melkweg.nl/ticket/",
            "afbeelding_url" => "https://melkweg.nl/optreden/plaatje.jpg"
        ];

        $result = $rep->saveOptreden($optreden);
        $isDeleted = $rep->deleteOptredens($result);

        dd($isDeleted);
    }
}
