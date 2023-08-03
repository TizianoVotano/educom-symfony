<?php

namespace App\Controller;

use Psr\Log\LoggerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/blog_list')]
class BlogController extends AbstractController
{
    #[Route('/', name: 'blog_list')]
    #[Template()]
    public function index(): Response
    {
        return $this->render('blog/index.html.twig', [
            'controller_name' => 'BlogController',
        ]);
    }

    #[Route('/show/{slug}',name:'blog_show')]
    public function show($slug) {
        dd('hi');
    }

    #[Route('/show/{page}',name:'blog_list', requirements: ['page' => '\d+'])]
    public function list($page) {
        dd('list');
    }

    

    // #[Route('/show/{id}',name:'blog_show')]
    // public function show(LoggerInterface $logger, $id = 1) {
    //     $logger->info("info Message");
    //     $logger->warning("Warning Message");
    //     $logger->error("De waarde van id is: $id");
    //     dd($id);
    // }
}
