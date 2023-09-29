<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class VerificationController extends AbstractController
{
    /**
     * @Route("/verification", name="app_verification")
     */
    public function index(Request $request): Response
    {
        $username = $request->query->get('username');
        return $this->render('verification/index.html.twig', [
            'controller_name' => 'VerificationController',
            'username' => $username,
        ]);
    }
}
