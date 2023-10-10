<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    /**
     * @Route("/contact", name="app_contact")
     */
    public function index(): Response
    {
        // Récupérez l'utilisateur connecté
        $user = $this->getUser();
        // Vérifiez si l'utilisateur est connecté
        if ($user) {
            $nomUtilisateur = $user->getNomUtilisateur();
            $prenomUtilisateur = $user->getPrenomUtilisateur();
        }
        if ($this->isGranted('IS_AUTHENTICATED_FULLY')) {
            return $this->render('contact/index.html.twig', [
                'controller_name' => 'ContactController',
                'nom' => $nomUtilisateur,
                'prenom' => $prenomUtilisateur,
            ]);
        } else {
            return $this->render('contact/erreur.html.twig', [
                'controller_name' => 'ContactController',
            ]);
        }
    }
}
