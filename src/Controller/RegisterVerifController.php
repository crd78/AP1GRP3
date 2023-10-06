<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Utilisateur;

class RegisterVerifController extends AbstractController
{
    /**
     * @Route("/register/verif", name="app_register")
     */
    public function register(Request $request): Response
    {
        if ($request->isMethod('POST')) {
            $nom = $request->request->get('nom');
            $prenom = $request->request->get('prenom');
            $email = $request->request->get('email');
            $password = $request->request->get('password');
            $password2 = $request->request->get('confirm_password');
            $nonadmin = 0;

            if ($password == $password2) {
                // Vérifie si l'email existe déjà dans la base de données
                $userRepository = $this->getDoctrine()->getRepository(Utilisateur::class);
                $existingUser = $userRepository->findOneBy(['emailUtilisateur' => $email]);

                if ($existingUser) {
                    // L'email existe déjà, renvoie un message d'erreur
                    return $this->redirectToRoute('app_erreur_register', ['message' => 'Email déjà utilisé']);
                }

                // Créez un nouvel utilisateur
                $user = new Utilisateur();
                $user->setNomUtilisateur($nom);
                $user->setPrenomUtilisateur($prenom);
                $user->setEmailUtilisateur($email);
                $user->setMotdepasseUtilisateur($password);
                $user->setAdminUtilisateur($nonadmin);

                // Enregistrement de l'utilisateur en base de données
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($user);
                $entityManager->flush();

                // Redirection après l'inscription
                return $this->redirectToRoute('app_accueil'); // Remplacez 'home' par la route de votre choix
            } else {
                return $this->redirectToRoute('app_erreur_register', ['message' => 'Les mots de passe ne correspondent pas']);
            }
        }

        return $this->render('inscription/index.html.twig');
    }
}