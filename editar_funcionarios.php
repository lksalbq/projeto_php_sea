<?php
$page_title = "Editar Funcionario";
include_once "header.php";
?>
<?php


$matricula = isset($_GET['matricula']) ? $_GET['matricula'] : die('erro na matricula');
 
$idcargo = isset($_GET['idcargo']) ? $_GET['idcargo'] : die('erro no cargo');

include_once 'config/database.php';
include_once 'funcionario.php';
include_once 'cargo.php';

$database = new Database();
$db = $database->getConnection();

$funcionario = new funcionario($db);
$cargo = new Cargo($db);

$funcionario->matricula = $matricula;

$cargo->idcargo = $idcargo;

$cargo->readOne();
$funcionario->readOne();
?>

<form id='update_form' action='' method='post' border='0' autocomplete="off">
    <table class='table table-bordered table-hover'>
        
        <tr>
            <td>Nome</td>
            <td>
                <input name='nome' type="text" class='form-control' value='<?php echo htmlspecialchars($funcionario->nome, ENT_QUOTES); ?>' required=/>
            </td>
        </tr>
        <tr>
            <td>Cargo</td>
            <td><input type='text' name='nomeCargo' class='form-control' value='<?php echo htmlspecialchars($cargo->nomeCargo, ENT_QUOTES);  ?>' required /></td>
        </tr>
        <tr>
            <td>Salario</td>
            <td><input id="salario" type='text' name='salario' class='form-control' value='<?php echo htmlspecialchars($cargo->salario, ENT_QUOTES);  ?>' required /></td>
        </tr>
        <tr>
            <td>
              
                <input type='hidden' name='matricula' value='<?php echo $matricula ?>' /> 
                <input type='hidden' name='idcargo' value='<?php echo $idcargo ?>' /> 
            </td>
            <td>
                <button type='submit' class='btn btn-primary'>
                    <span class='glyphicon glyphicon-edit'></span> Salvar Alterações
                </button>
            </td>
        </tr>
    </table>
</form>

<div id="msgsucessoalt"  style="display: none;" class="alert alert-success alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        Funcionário alterado com sucesso!
</div>