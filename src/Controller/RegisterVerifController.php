<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
//use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
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
            $nonadmin = 0;

            // Créez un nouvel utilisateur
            $user = new Utilisateur();
            $user->setNomUtilisateur($nom);
            $user->setPrenomUtilisateur($prenom);
            $user->setEmailUtilisateur($email);
            $user->setMotdepasseUtilisateur($password);
            $user->setAdminUtilisateur($nonadmin);
            // Encodage du mot de passe
            //$encodedPassword = $passwordEncoder->encodePassword($user, $motdepasse);
            //$user->setPassword($encodedPassword);

            // Enregistrement de l'utilisateur en base de données
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();

            // Redirection après l'inscription
            return $this->redirectToRoute('app_accueil'); // Remplacez 'home' par la route de votre choix
            //redirectToRoute
        }

        return $this->render('inscription/index.html.twig');
    }
}