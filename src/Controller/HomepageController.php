<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

#[Route('/')]
class HomepageController extends AbstractController
{
    #[Route('/', name: 'homepage')]
    #[Template()]
    public function index(): Response
    {
        return $this->render('homepage/index.html.twig', [
            'controller_name' => 'HomepageController',
        ]);
    }

    #[Route('/backhome', name: 'backhome')]
    public function backhome() {
        return $this->redirectToRoute('homepage');
    }

    #[Route(path: [
        'en' => '/contact-us',
        'nl' => '/neem-contact-op'
    ], name: 'contact')]
    public function contact(Request $request) {
        $locale = $request->getLocale();
        $msg = "This page is in English";
        if ($locale == "nl") {
            $msg = "Deze pagina is in het Nederlands";
        }
        return new Response(
            "<html><body>$msg</body></html>"
        );
    }
}
