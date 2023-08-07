<?php

namespace App\Controller;

use App\Entity\Poppodium;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PoppodiumController extends AbstractController
{
    #[Route('/poppodium', name: 'poppodium')]
    public function index(): Response
    {
       /// We simuleren hier even een $_POST van een formulier
       $podium = [
        "naam" => "De Melkweg",
        "adres" => "Lijnbaansgracht 234a",
        "postcode" => "1017PH",
        "woonplaats" => "Amsterdam",
        "telefoonnummer" => "020-5318181",
        "email" => "info@melkweg.nl",
        "website" => "https://melkweg.nl",
       ];

       $rep = $this->getDoctrine()->getRepository(Poppodium::class);
       $result = $rep->savePodium($podium);

       dd($result);

    }
}
