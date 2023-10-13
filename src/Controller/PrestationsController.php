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
        $prestations = $this->getDoctrine()->getRepository(Prestation::class)->findAll();

        return $this->render('prestations/index.html.twig', [
            'prestations' => $prestations,
        ]);
    }
}