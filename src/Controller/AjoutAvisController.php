<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Utilisateur;
use App\Entity\Avis;
use Symfony\Component\DateTime\DateTime;
use DateTime as PhpDateTime;

class AjoutAvisController extends AbstractController
{
    /**
     * @Route("/ajoutavis", name="app_ajout_avis")
     */
    public function ajout(Request $request): Response
    {
        // Récupérez l'utilisateur connecté
        $user = $this->getUser();
        // Vérifiez si l'utilisateur est connecté
        if ($user) {
            $idUser = $user->getID();
        }
        if ($request->isMethod('POST')) {
            //$nom = $request->request->get('name');
            //$email = $request->request->get('email');
            $contenuAvis = $request->request->get('contenuAvis');
            //$message = $request->request->get('message');
            $currentDateTime = new \DateTime();
            $note = $request->request->get('rating');

            // Créez un nouveau contact
            $avis = new Avis();
            $avis->setLibelleAvis((string) $contenuAvis);
            $avis->setNoteAvis($note);
            $avis->setIdUtilisateurAvis($idUser);
            $avis->setDateAvis($currentDateTime);

            // Enregistrement de l'utilisateur en base de données
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($avis);
            $entityManager->flush();

            // Redirection après l'inscription
            return $this->redirectToRoute('app_avis');
        }

        return $this->render('avis/index.html.twig');
    }
}
