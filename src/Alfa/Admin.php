<?php declare(strict_types = 1);

require("Usuario.php");

class Admin extends Usuario {
    public $matricula;

    function __construct(string $email, string $senha, int $matricula){
        $this->email = $email;
        $this->senha = $senha;
        $this->matricula = $matricula;

       //parent::log('Ah pai, para...');

    }

}