<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\HttpClient\HttpClientInterface;


class PostController extends AbstractController
{
    private HttpClientInterface $httpClient;


    /**
     * @param HttpClientInterface $httpClient
     */
    public function __construct(HttpClientInterface $httpClient)
    {
        $this -> httpClient = $httpClient;
    }


    #[Route('/posts', name: 'app_posts_index')]
    public function index(): Response
    {
        $reponseApi = $this->httpClient->request("GET",
            "http://localhost:8000/api/posts");
        $post = $reponseApi->toArray();

        dd($post);
    }
}

