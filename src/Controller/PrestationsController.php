<?php

// src/Controller/PrestationsController.php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Prestation;
use App\Form\PrestationType;

class PrestationsController extends AbstractController
{
    /**
     * @Route("/prestations", name="app_prestation")
     */
    public function index(Request $request): Response
    {
        $prestations = $this->getDoctrine()->getRepository(Prestation::class)->findAll();
        if ($this->isGranted('IS_AUTHENTICATED_FULLY') and $this->getUser()->isVerified()){
            return $this->render('prestations/admin.html.twig', [
                'prestations' => $prestations,
            ]);
        }
        else {
            return $this->render('prestations/index.html.twig', [
                'prestations' => $prestations,
            ]);
        }
        
    }
    /**
 * @Route("/prestationsedit={id}", name="prestation_edit")
 */
public function edit(Request $request, Prestation $prestation): Response
{
    $form = $this->createForm(PrestationType::class, $prestation);

    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
        $this->getDoctrine()->getManager()->flush();

        return $this->redirectToRoute('app_prestation');
    }

    return $this->render('prestations/edit.html.twig', ['form' => $form->createView()]);
}

/**
 * @Route("/prestations/{id}/delete", name="prestation_delete")
 */
public function delete(Request $request, Prestation $prestation): Response
{
    $entityManager = $this->getDoctrine()->getManager();
    $entityManager->remove($prestation);
    $entityManager->flush();

    return $this->redirectToRoute('app_prestation');
}

/**
 * @Route("/prestationsnew", name="prestation_new")
 */
public function new(Request $request): Response
{
    $prestation = new Prestation();
    $form = $this->createForm(PrestationType::class, $prestation);

    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($prestation);
        $entityManager->flush();

        return $this->redirectToRoute('app_prestation');
    }

    return $this->render('prestations/new.html.twig', ['form' => $form->createView()]);
}
}