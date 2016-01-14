<?php

//update do usuario requisitado via ajax com a matricula e cargo a serem editados
include_once 'config/database.php';
include_once 'funcionario.php';
include_once 'cargo.php';
 
$database = new Database();
$db = $database->getConnection();
 

$funcionario = new Funcionario($db);
$cargo = new Cargo($db);

$funcionario->nome=$_POST['nome'];
$funcionario->matricula=$_POST['matricula'];


$cargo->nomeCargo=$_POST['nomeCargo'];
$cargo->salario=$_POST['salario'];
$cargo->idcargo=$_POST['idcargo'];


$funcionario->update();
$cargo->update();

?>