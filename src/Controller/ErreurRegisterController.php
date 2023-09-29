<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ErreurRegisterController extends AbstractController
{
    /**
     * @Route("/erreurregister", name="app_erreur_register")
     */
    public function index(): Response
    {
        return $this->render('erreur_register/index.html.twig', [
            'controller_name' => 'ErreurRegisterController',
        ]);
    }
}
