<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AccueilController extends AbstractController
{
        #[Route('/', name: 'app_accueil')]
    public function index(RequestStack $request ): Response
    {
        $token= $request->getSession()->get("token","rien");
        return $this->render('accueil/index.html.twig', [
            'controller_name' => 'AccueilController',
            'token' => $token
        ]);
    }
}
