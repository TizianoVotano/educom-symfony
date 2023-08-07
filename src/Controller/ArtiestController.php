<?php

namespace App\Controller;

use App\Entity\Artiest;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArtiestController extends AbstractController
{
    #[Route('/artiest', name: 'artiest')]
    public function index(): Response
    {
        /// We simuleren hier even een $_POST van een formulier
        $artiest = [
        "naam" => "Ed Sheeran",
        "genre" => "Pop?",
        "omschrijving" => "GG: Ginger Genius",
        "afbeelding_url" => "https://i.guim.co.uk/img/media/e712b2a9c1a544e012b79afd53f8a571ccd33189/423_127_3548_2127/master/3548.jpg?width=1200&height=1200&quality=85&auto=format&fit=crop&s=a18a5822e74e9be0abb8da688cb2d3e3",
        "website" => "https://melkweg.nl"
       ];

       $rep = $this->getDoctrine()->getRepository(Artiest::class);
       $result = $rep->savePodium($artiest);

       dd($result);
        // return $this->render('artiest/index.html.twig', [
        //     'controller_name' => 'ArtiestController',
        // ]);
    }
}
