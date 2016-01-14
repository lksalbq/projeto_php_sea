<?php
session_start();

//página restrita que só quem está logado acessa

if((!isset ($_SESSION['usuario']) == true) and (!isset ($_SESSION['senha']) == true)){ 
    unset($_SESSION['usuario']); 

    unset($_SESSION['usuario']); 
    unset($_SESSION['senha']); 
    header('location:index.php');
    } 
    
    $logado = $_SESSION['usuario'];
    $nivel = $_SESSION['nivel']; 
 
    //caso o nivel seja 2 o usuario não tem permissão de acesso nessa pagina, somente nivel 1 (administrador)
    if($nivel == 2){
        echo "<script> alert('Você Não tem permissão para acessar a lista de Funcionários!');"
        . "window.location='cadastro_funcionario.php'</script>;";
    }
    
?>
<?php

$page_title = "Lista de Funcionarios";
include_once "header.php";
?>

<?php

echo "<div class='right-button-margin'>";
echo "<a href='cadastro_funcionario.php' class='btn btn-default pull-right'>Cadastro</a>";
echo "</div>";
echo "<div class='right-button-margin'>";
echo "<strong>Logado Como:  ". $logado ."!</strong>  <a href='logout.php' class='glyphicon glyphicon-log-out'> SAIR</a>";
echo "</div>";

include_once 'config/database.php';
include_once 'funcionario.php';
include_once 'cargo.php';


$database = new Database();
$db = $database->getConnection();
 

$funcionario = new Funcionario($db);
$cargo = new Cargo($db);

$stmt = $funcionario->readAll();
$stmt2 = $cargo->readAll();

$num = $stmt->rowCount();

//lista os funcionarios cadastrados

if($num>0){
 

    echo "<table id='lista_func' class='table table-bordered table-hover'>";
     
    
        echo "<tr>";
            echo "<th class='width-30-pct'>Matricula</th>";
            echo "<th class='width-100-pct'>Nome</th>";
            echo "<th>Cargo</th>";
            echo "<th>Salario</th>";
            echo "<th style='text-align:center;'>Ação</th>";
        echo "</tr>";
         

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
               
            $row2 = $stmt2->fetch(PDO::FETCH_ASSOC);
            
            extract($row);
            extract($row2);
         
            echo "<tr>";
                echo "<td>{$matricula}</td>";
                echo "<td>{$nome}</td>";
                echo "<td>{$nomeCargo}</td>";
                echo "<td>{$salario}</td>";
                echo "<td style='text-align:center;'>";

                    echo "<div id='matricula' class='matricula display-none' style='display: none;'>{$matricula}</div>";
                    echo "<div id='idcargo' class='idcargo display-none' style='display: none;'>{$idcargo}</div>"; 
                    
                    echo "<div class='btn btn-info edit-btn margin-right-1em'>";
                        echo "<span class='glyphicon glyphicon-edit'></span> Editar";
                    echo "</div>";
                     
                
                    echo "<div class='btn btn-danger delete-btn'>";
                        echo "<span class='glyphicon glyphicon-remove'></span> Deletar";
                    echo "</div>";
                echo "</td>";
            echo "</tr>";
        }
         
    echo "</table>";
     
}

else{
    echo "<div class='alert alert-info'>Nenhum Funcionário Cadastrado!</div>";
}
 
?>

<?php

include_once "footer.php";
?>