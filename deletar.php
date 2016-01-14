<?php

//recebe a matricula do funcionario via requisição ajax e deleta o funcionario

include_once 'config/database.php';
include_once 'funcionario.php';

$database = new Database();
$db = $database->getConnection();



$funcionario = new funcionario($db);
 
$funcionario->matricula=$_POST['matricula'];
$funcionario->deletar();
?>