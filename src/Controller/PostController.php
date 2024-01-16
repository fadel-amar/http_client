<?php

namespace App\Controller;

use App\Service\ApiPosts;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class PostController extends AbstractController
{

    #[Route('/posts', name: 'app_posts_index')]
    public function index(ApiPosts $apiPosts): Response
    {

        $posts = $apiPosts->getPosts();

       return $this->render('post/index.html.twig', ['posts'=> $posts]);



    }
}

