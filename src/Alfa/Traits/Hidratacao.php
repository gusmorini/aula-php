<?php

namespace Alfa\Traits;

trait Hidratacao
{
	// o método vai ser genério servindo para outros formularios
    public function hydrate(array $dados){

        $atributos = get_object_vars($this);

        foreach ($dados as $nome => $valor) {
            if (in_array($nome, array_keys($atributos))){
                $this->$nome = $valor;
            }
        }
    }
}