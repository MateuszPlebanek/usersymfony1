<?php
// src/Controller/LoginController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class LoginController extends AbstractController
{
    #[Route('/login', name: 'app_login')]
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        // obtenir les erreurs de connexion, le cas échéant
        $error = $authenticationUtils->getLastAuthenticationError();

        // dernier nom d’utilisateur saisi par l’utilisateur
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('login.html.twig', [
            'last_username' => $lastUsername,
            'error' => $error,
        ]);
    }

    #[Route('/logout', name: 'app_logout')]
    public function logout(): void
    {
        // Ne sera jamais exécuté, Symfony intercepte cette route pour déconnecter l'utilisateur
       throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }
}
