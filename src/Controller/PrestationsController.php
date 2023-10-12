<?php

// src/Controller/PrestationsController.php

namespace App\Controller;

use App\Entity\Prestation;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PrestationsController extends AbstractController
{
    /**
     * @Route("/prestations", name="app_prestation")
     */
    public function index(Request $request): Response
    {
        $user = $this->getUser();

        if ($user && $this->isGranted('IS_AUTHENTICATED_FULLY')) {
            $nomUtilisateur = $user->getNomUtilisateur();
            $prenomUtilisateur = $user->getPrenomUtilisateur();

            // Traitement du formulaire
            if ($request->isMethod('POST')) {
                $selectedPrestations = $request->request->get('prestations', []);

                // Sauvegardez les prestations sélectionnées dans la base de données
                $entityManager = $this->getDoctrine()->getManager();

                foreach ($selectedPrestations as $prestationName) {
                    $prestation = new Prestation();
                    $prestation->setName($prestationName);
                    // Vous pouvez définir d'autres propriétés de l'entité ici
                    $entityManager->persist($prestation);
                }

                $entityManager->flush();
            }

            return $this->render('prestations/index.html.twig', [
                'controller_name' => 'PrestationsController',
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