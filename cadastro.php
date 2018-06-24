<?php 

	require_once 'autoload.php';
	
	use Alfa\Usuario;

	$dados = $_POST;

	//faz a ligação PDO com o banco de dados
	$dsn = 'mysql:host=localhost;dbname=alfa_turma3';
	$dbh = new PDO($dsn, 'gustavo', '1234');

	if($dados['senha'] == $dados['confirma_senha']){

		// md5 e sh1 já era, usar o password_hash gera uma senha de 60 caracteres
		// a partir do php7 pode usar o PASSWORD_ARGON2I em vez do PASSWORD_BCRYPT
		// ARGON2I gera 95 caracteres em vez de 60

		$dados['senha'] = password_hash($dados['senha'],PASSWORD_BCRYPT);
		$usuario = new Usuario($dados, $dbh);
		$usuario->persistir();

		header("Location: http://localhost/aula-php/cadastro.html");
		die();

	}else{
		echo 'as senhas não são iguais';
	}