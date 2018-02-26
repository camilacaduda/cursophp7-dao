<?php 

require_once("config.php");

//carrega um usuario
/*$root = new Usuario();
$root->loadbyId(3);*/
//echo $root;


// carrega uma lista

$list = Usuario::getList();

echo json_encode($list);




 ?>