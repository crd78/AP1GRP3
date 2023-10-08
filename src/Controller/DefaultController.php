<?php

namespace App\Controller;

use App\Form\UserType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route("/default", name="app_default")
     */
   
     public function index(Request $request, EntityManagerInterface $entityManager): Response
     {
         $user = new User();
         $form = $this->createForm(UserType::class, $user);
         $form->handleRequest($request);
         if ($form->isSubmitted() && $form->isValid()){
             $entityManager->persist($user);
             $entityManager->flush();
         }
         return $this->render('default/index.html.twig', [
             'form' => $form->createView()
         ]);
     }
}

