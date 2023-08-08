<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\Artiest;
use App\Entity\Poppodium;
use App\Entity\Optreden;
use App\Repository\OptredenRepository;
use App\Service\OptredenService;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

#[Route('/optreden')]
class OptredenController extends BaseController
{
    private $os;

    public function __construct(OptredenService $os) {
        $this->os = $os;
    }

    #[Route('/save', name: 'optreden_save')]
    public function saveOptreden() : Response {
        $doctrine = $this->doctrine();

        /** @var OptredenRepository $rep */
        $rep = $doctrine->getRepository(Optreden::class);

        /// Ook hier weer een kleine simulatie van een "POST" request
        $optreden = [
            "poppodium_id" => 1,
            "hoofdprogramma_id" => 3,
            "omschrijving" => "Een avondje blues uit het boekje...",
            "datum" => "2022-07-14",
            
            /// Prijs altijd in centen wegscrhijven ivm afronding
            "prijs" => 3800,
            
            "ticket_url" => "https://melkweg.nl/ticket/",
            "afbeelding_url" => "https://melkweg.nl/optreden/plaatje.jpg"
        ];

        $result = $this->os->saveOptreden($optreden);
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
            "hoofdprogramma_id" => 3,
            "omschrijving" => "Een avondje blues uit het boekje...",
            "datum" => "2022-07-14",
            
            /// Prijs altijd in centen wegscrhijven ivm afronding
            "prijs" => 3800,
            
            "ticket_url" => "https://melkweg.nl/ticket/",
            "afbeelding_url" => "https://melkweg.nl/optreden/plaatje.jpg"
        ];

        $result = $rep->saveOptreden($optreden);
        $isDeleted = $rep->deleteOptredenAndArtiest($result); // dit duidelijker opstellen

        dd($isDeleted);
    }
}
