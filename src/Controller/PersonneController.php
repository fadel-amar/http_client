<?php

namespace App\Controller;

use App\Form\PersonneType;
use App\Model\PersonneModel;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class PersonneController extends AbstractController
{
    #[Route('/personne/register', name: 'app_personne_register')]
    public function register(RequestStack $request): Response
    {
        $personne = new PersonneModel();
        // Créer le formulaire
        $form = $this->createForm(PersonneType::class, $personne);

        $form->handleRequest($request->getCurrentRequest());
        if($form->isSubmitted()) {
            // Traitement de donnés
            dd($personne);
            $this->redirectToRoute("/");
        }


        return $this->render('personne/index.html.twig', [
            'form' => $form
        ]);
    }
}
