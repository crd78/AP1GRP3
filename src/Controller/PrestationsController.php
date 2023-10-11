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
     * @Route("/submit.php", name="submit_form", methods={"POST"})
     */
    public function submitForm(Request $request): Response
    {
        // Récupérer les données du formulaire
        $prestationsData = $request->request->get('prestations');

        // Créer et enregistrer une nouvelle entité Prestation pour chaque prestation sélectionnée
        $entityManager = $this->getDoctrine()->getManager();

        foreach ($prestationsData as $prestationName) {
            $prestation = new Prestation();
            $prestation->setLibellePrestation($prestationName);
            $prestation->setPrixUnitairePrestation($prestationName);
            $prestation->setDescriptionPrestation($prestationName);
            $prestation->setDureePrestation($prestationName);


            $entityManager->persist($prestation);
        }

        // Enregistrer les changements dans la base de données
        // Enregistrement de l'utilisateur en base de données
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($prestation);
        $entityManager->flush();

        // Rediriger ou renvoyer la réponse appropriée
        return $this->redirectToRoute('app_prestations');
    }
}
