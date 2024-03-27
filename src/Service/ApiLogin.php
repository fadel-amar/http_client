<?php

namespace App\Service;

use App\Model\UserModel;
use http\Client\Curl\User;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class ApiLogin
{
    private HttpClientInterface $httpClient;

    /**
     * @param HttpClientInterface $httpClient
     */
    public function __construct(HttpClientInterface $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    public function login_check (UserModel $userModel) {
        $reponseApi = $this->httpClient->request(
            "POST",
            "http://172.16.220.1:8000/api/login_check",
            ["json"=>[
                "username" => "$userModel->email",
                "password" => "$userModel->password"
            ]]);


        return (($reponseApi->toArray())['token']);
    }





}