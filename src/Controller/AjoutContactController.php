<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Utilisateur;
use App\Entity\Contact;
use Symfony\Component\DateTime\DateTime;
use DateTime as PhpDateTime;

class AjoutContactController extends AbstractController
{
    /**
     * @Route("/ajoutcontact", name="app_ajout_contact")
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
            $nom = $request->request->get('name');
            $email = $request->request->get('email');
            $objet = $request->request->get('subject');
            $message = $request->request->get('message');
            $currentDateTime = new \DateTime();

            // Créez un nouveau contact
            $contact = new Contact();
            $contact->setCtIdUtilisateur($idUser);
            $contact->setObjetContact($objet);
            $contact->setContenuContact($message);
            $contact->setDateContact($currentDateTime);

            // Enregistrement de l'utilisateur en base de données
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($contact);
            $entityManager->flush();

            // Redirection après l'inscription
            return $this->redirectToRoute('app_contact');
        }

        return $this->render('contact/index.html.twig');
    }
}
