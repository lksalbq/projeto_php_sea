<?php
session_start();

//faz o login do usuario de acordo com os dados passados

include_once './config/database.php';
include_once 'login.php';

$database = new Database();
$db = $database->getConnection();

$login = new Login($db);

$login->usuario = $_POST['usuario'];
$login->senha = $_POST['senha'];


$stmt = $login->logando();

$nivelarray = $login->recuperaNivel();
$nivel = $nivelarray['nivel'];

$num = $stmt->rowCount();

if($num > 0)
{   
    echo 1;
    $_SESSION['usuario'] = $login->usuario;
    $_SESSION['senha'] = $login->senha;
    $_SESSION['nivel'] = $nivel;
    
}
else{
    echo 0;      
}

?>