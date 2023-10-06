<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ErreurLoginController extends AbstractController
{
    /**
     * @Route("/erreurlogin", name="app_erreur_login")
     */
    public function index(): Response
    {
        return $this->render('erreur_login/index.html.twig', [
            'controller_name' => 'ErreurLoginController',
        ]);
    }
}
