<?php

namespace App\Controller;

use Psr\Log\LoggerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/blog_list')]
class BlogController extends BaseController
{
    #[Route('/', name: 'blog_list')]
    #[Template()]
    public function index(): Response
    {
        return $this->render('blog/index.html.twig', [
            'controller_name' => 'BlogController',
        ]);
    }

    #[Route('/show/{page}',name:'blog_list', requirements: ['page' => '\d+'])]
    public function list($page) {
        dd('list');
    }

    #[Route('/show/{id}',name:'blog_show')]
    public function show($id = 1) {
        $this->log("info Message from extended BaseController", "warning");
        $this->log("info Message from extended BaseController", "info");
        $this->log("info Message from extended BaseController", "error");
        dd('hi');
    }

    

    

    // #[Route('/show/{id}',name:'blog_show')]
    // public function show(LoggerInterface $logger, $id = 1) {
    //     $logger->info("info Message");
    //     $logger->warning("Warning Message");
    //     $logger->error("De waarde van id is: $id");
    //     dd($id);
    // }
}
