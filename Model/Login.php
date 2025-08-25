<?php

namespace NEWNEWAPP\Model;

use NEWNEWAPP\DAO\LoginDAO;
use NEWNEWAPP\Model\Model; // Certo agora
use Exception;

final class Login extends Model
{
    public $Id, $Email, $Senha, $Nome;

    public function logar() : Login
    {
        return (new LoginDAO())->autenticar($this);
    }
}
