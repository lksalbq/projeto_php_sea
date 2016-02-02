<?php
//faz a insercao do funcionario via requisicao ajax caso tudo esteja conforme

if($_POST){

    include_once 'config/database.php';
    $database = new Database();
    $db = $database->getConnection();

    
    include_once 'login.php';
    $login = new Login($db);
   
    
    include_once 'funcionario.php';
    $funcionario = new Funcionario($db);
    
    include_once 'endereco.php';
    $endereco = new Endereco($db);
   
    include_once 'cargo.php';
    $cargo = new Cargo($db);
    
    $funcionario->matricula = $_POST['matricula'];
    $validaMatricula = $funcionario->verificaMatricula();
    

    if($validaMatricula['matricula'] == $funcionario->matricula){
        echo $validaMatricula['matricula'];
        return false;
    }else{
        echo 2;
    }
    
    $cargo->nomeCargo = strip_tags($_POST['nomeCargo']);
    $cargo->salario = $_POST['salario'];
   
    if($cargo->create()){   
        $idcargo = $cargo->retornaID();
         $id_cargo_funcionario = $idcargo['idcargo'];
    }
    
    $endereco->logradouro = strip_tags($_POST['logradouro']);
    $endereco->numero = strip_tags($_POST['numero']);
    $endereco->complemento = strip_tags($_POST['complemento']);
    $endereco->bairro = strip_tags($_POST['bairro']);
    $endereco->cidade = strip_tags($_POST['cidade']);
    $endereco->uf = $_POST['uf'];
    $endereco->cep = $_POST['cep'];
   
    if($endereco->create()){        
        $idendereco = $endereco->retornaID();
        $id_endereco_funcionario = $idendereco['idendereco'];
    }
    
    
    
    $funcionario->nome = strip_tags($_POST['nome']);
    $funcionario->sexo = $_POST['sexo'];
    $funcionario->dataNascimento = $_POST['dataNascimento'];
    $funcionario->dataAdmissao = $_POST['dataAdmissao'];
    $funcionario->rg = $_POST['rg'];
    $funcionario->cpf = $_POST['cpf'];
    $funcionario->fkEndereco = $idendereco['idendereco'];
    $funcionario->fkCargo = $idcargo['idcargo'];
    

    $funcionario->create();  
    
    
    
    $login->usuario = strip_tags($_POST['usuario']);
    $login->senha = $_POST['senha'];
    $login->nivel = $_POST['nivel'];
    $login->fkFuncionario = $_POST['matricula'];

   $login->create();
  
}
?>
