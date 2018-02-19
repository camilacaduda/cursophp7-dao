<<?php 

require_once("config.php");

$sql = new Sql();

$usuarios = select("SELECT * FROM tb_usuario");

echo json_encode($usuarios);








 ?>