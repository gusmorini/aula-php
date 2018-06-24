<?php

if (isset ($_GET['s'])){
	$busca = $_GET['s'];
}else{
	$busca = '';
}

echo $busca .'<br><br>';

$dsn = 'mysql:host=localhost;dbname=teste-estados';
$dbh = new PDO($dsn, 'gustavo', '1234');
//$sql = 'SELECT * FROM Estado';
$sql = 'SELECT * FROM Estado WHERE Nome = :h ';
$stmt = $dbh->prepare($sql);
$stmt->bindParam(':h', $busca, PDO::PARAM_STR);
$stmt->execute();

while ($record = $stmt->fetchObject()){
   var_dump($record);
   echo($record->Nome) . '<br>';
}

$dbh = NULL;