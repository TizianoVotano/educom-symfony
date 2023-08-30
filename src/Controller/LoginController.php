<?php

namespace App\Controller;

use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LoginController extends AbstractController
{
    #[Route('/login', name: 'app_login')]
    public function index(AuthenticationUtils $authenticationUtils): Response
    {
        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();

        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('login/index.html.twig', [
            'last_username' => $lastUsername,
            'error'         => $error,
        ]);
    }

    // https://symfony.com/doc/5.4/controller.html#redirecting
    #[Route('/login_handler', name: 'app_login_handler')]
    public function login_handler(): RedirectResponse
    {
        $user = $this->getUser();
        $roles = $user->getRoles();

        if (in_array('ROLE_ADMIN', $roles)) {
            dd("The admin role hasn't been implemented yet");
        } else if (in_array('ROLE_CANDIDATE', $roles)) {
            $returnPath = 'candidate_profile';
        } else { // Employer
            $returnPath = 'employer_profile';
        }
        
        return $this->redirectToRoute($returnPath);
    }
}
