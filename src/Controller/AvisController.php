<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AvisController extends AbstractController
{
    /**
     * @Route("/avis", name="app_avis")
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
            return $this->render('avis/index.html.twig', [
                'controller_name' => 'AvisController',
                'nom' => $nomUtilisateur,
                'prenom' => $prenomUtilisateur,
            ]);
        } else {
            return $this->render('avis/erreur.html.twig', [
                'controller_name' => 'AvisController',
            ]);
        }
    }
}