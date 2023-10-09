<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Utilisateur;

class VerificationController extends AbstractController
{
    /**
     * @Route("/verification", name="app_verification")
     */
    public function login(Request $request): Response
    {
        if ($request->isMethod('POST')) {
            $email = $request->request->get('email');
            $password = $request->request->get('password');

            // Récupération de l'utilisateur par son email
            $userRepository = $this->getDoctrine()->getRepository(Utilisateur::class);
            $user = $userRepository->findOneBy(['emailUtilisateur' => $email]);

            if (!$user) {
                // L'utilisateur n'existe pas, renvoie un message d'erreur
                return $this->redirectToRoute('app_erreur_login', ['message' => 'Email ou mot de passe incorrect']);
            }

            // Vérification du mot de passe
            $hashedPassword = md5($password);
            if ($hashedPassword !== $user->getMotdepasseUtilisateur()) {
                // Mot de passe incorrect, renvoie un message d'erreur
                return $this->redirectToRoute('app_erreur_login', ['message' => 'Mot de passe incorrect']);
            }

            // Connexion réussie, vous pouvez implémenter ici la logique de gestion de session ou d'authentification
            // Par exemple, vous pouvez utiliser le composant Security de Symfony pour gérer l'authentification.

            // Redirection après la connexion réussie
            return $this->redirectToRoute('app_accueil');
        }

        return $this->render('connexion/index.html.twig');
    }
}