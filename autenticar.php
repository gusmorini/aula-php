<?php 

	require_once 'autoload.php';
	
	use Alfa\Usuario;

	$dados = $_POST;

	//faz a ligação PDO com o banco de dados
	$dsn = 'mysql:host=localhost;dbname=alfa_turma3';
	$dbh = new PDO($dsn, 'gustavo', '1234');

	$usuario = new Usuario ($dados, $dbh);

	if ($usuario->autenticar())
	{
		echo 'Usuário logado com sucesso';
	}else
	{
		echo 'E-mail e ou Senha inválidos';
	}