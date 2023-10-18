<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Avis;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;

class AvisController extends AbstractController
{
    /**
     * @Route("/avis", name="app_avis")
     */
    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {
        $avis = $this->getDoctrine()->getRepository(Avis::class)->findAll();
        $avisAvecUtilisateurs = array();

    foreach ($avis as $unavis) {
    $userId = $unavis->getIdUtilisateurAvis();
    $userRepository = $entityManager->getRepository(User::class);
    $unutilisateur = $userRepository->find($userId);
    $avisAvecUtilisateurs[] = [
        'avis' => $unavis,
        'utilisateur' => $unutilisateur,
    ];
}
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
                'avisAvecUtilisateurs' => $avisAvecUtilisateurs,
            ]);
        } else {
            return $this->render('avis/erreur.html.twig', [
                'controller_name' => 'AvisController',
                'avisAvecUtilisateurs' => $avisAvecUtilisateurs,
            ]);
        }
    }
}