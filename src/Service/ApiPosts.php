<?php

namespace App\Service;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class ApiPosts
{
    private HttpClientInterface $httpClient;

    /**
     * @param HttpClientInterface $httpClient
     */
    public function __construct(HttpClientInterface $httpClient)
    {
        $this -> httpClient = $httpClient;
    }


    public function getPosts() {


        $reponseApi = $this->httpClient->request(
            "GET",
            "http://172.16.220.1:8000/api/posts");

        return $reponseApi->toArray();
    }


}