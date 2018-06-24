<?php 
namespace Alfa\Abstracao;

//interface BancoDeDados
abastract class BancoDeDados
{
	public abstract function conectar($host,$bd,$usuario,$senha);
	public function desconectar()
	{
		echo 'desconectei...';
	}
}