<?php declare(strict_types = 1);

require_once '../autoload.php';

use Alfa\Usuario;

$u = new Usuario('gustavo@localhost','1234');
var_dump($u);