<?php

namespace App\Model;
use Symfony\Component\Validator\Constraints as Assert;

class UserModel
{

    #[Assert\NotBlank(
        message : "L'email est obligatoire"
    )]
    #[Assert\Email (
        message: "L'email n'est pas valide"
    )]
    public ?string $email = null;

    #[Assert\NotBlank(
        message: "Le mot de passe est obligatoire"
    )]
    public ?string $password = null;




}