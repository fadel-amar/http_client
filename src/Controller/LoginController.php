<?php

namespace App\Controller;

use App\Form\UserType;
use App\Model\UserModel;
use App\Service\ApiLogin;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LoginController extends AbstractController
{
    #[Route('/login', name: 'app_login')]
    public function login(RequestStack $request, ApiLogin $apiLogin): Response
    {
/*     dd( $request->getSession());*/
        $user = new UserModel();
        // Créer le formulaire
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request->getCurrentRequest());
        if($form->isSubmitted() && $form->isValid()) {
            //
            $token = $apiLogin->login_check($user);
            $request->getSession()->set("token", $token);

            $this->addFlash("success", "Vous êtes bien authentifié");
            return $this->redirectToRoute("app_accueil");
        }


        return $this->render('login/index.html.twig', [
            'form' => $form,
        ]);
    }
}
