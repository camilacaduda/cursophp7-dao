<?php 

require_once("config.php");

//carrega um usuario
/*$root = new Usuario();
$root->loadbyId(3);*/
//echo $root;


// carrega uma lista

/*$list = Usuario::getList();

echo json_encode($list);*/

//trazendo os dados do aluno
/*$aluno = new Usuario();

//criando um novo usuario
$aluno->setDeslogin("aluno");
$aluno->setDessenha("@alun0");
$aluno->insert();
echo $aluno;*/

//ataulizando um usuario

$usuario = new Usuario();
$usuario->loadbyId(4);
$usuario->update("professor","!@#$%&");
echo $usuario;

 ?>