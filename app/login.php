<?php declare(strict_types = 1);

//require("../src/Admin.php");
require_once("../src/Usuario.php");

//$u = new Admin('raposa@gmail.com', '159432687', 00000);
$usuario = new Usuario('raposa@gmail.com', '159432687');

//Usuario::log('teste');

//var_dump($u);

// $f = function (){
//     echo('oi');
// };

// $f();

// $a = [1, 2, 3];
// $a = array_map(function ($p) { return $p + 1; }, $a);

// // var_dump($a);

// $o = new class(2){
//     public $x;
//     public $y;

//     public function __construct($z){
//         $this->x = 3;
//         $this->y = $z;
//     }
// };

$array = serialize($usuario);

var_dump(unserialize($array, ['allowed_classes' => ['Usuario', 'Admin']]));

