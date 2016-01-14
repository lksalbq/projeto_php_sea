<?php
//faz o logout caso ele clique em "sair"
session_start();	
session_destroy();
header("Location: index.php"); exit;
?>