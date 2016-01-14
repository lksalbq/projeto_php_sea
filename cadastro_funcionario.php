<?php

session_start();

//inicia a ssessão e verifica se o usuario está autenticado
if((!isset ($_SESSION['usuario']) == true) and (!isset ($_SESSION['senha']) == true)){ 
        unset($_SESSION['usuario']); 

    unset($_SESSION['usuario']); 
    unset($_SESSION['senha']); 
    header('location:index.php'); } $logado = $_SESSION['usuario']; 

?>


<?php
//inclui o header no topo da página
$page_title = "EMPRESA - Cadastro de Funcionários";

include_once "header.php";
?>


<?php

echo "<div class='right-button-margin'>";
echo "<a href='lista_funcionarios.php' class='btn btn-default pull-right'>Funcionários</a>";
echo "</div>";
echo "<div class='right-button-margin'>";
echo "Bem Vindo, <strong> ". $logado ."!</strong>  <a href='logout.php' class='glyphicon glyphicon-log-out'> SAIR</a>";
echo "</div>";


//inclui a conexão

include_once 'config/database.php';

$database = new Database();
$db = $database->getConnection();


echo "<br/>";
echo "<br/>";
echo "<br/>";
?>

<div id="load" class="form-group"></div>
<div id="msgsucesso"  style="display: none;" class="alert alert-success alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        Funcionário cadastrado com sucesso!
</div>

<div id="msgErro"  style="display: none;" class="alert alert-danger alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        Senhas Diferentes!
</div>

<form id="cadastro" class="form-horizontal" action="" method="post" autocomplete="off">

    <fieldset>

        <div class="form-group"><legend> Informações de Login </legend></div>
        <div class="form-group">
            <label class="col-md-4 control-label" for="usuario">Usuário</label>  
            <div class="col-md-4">
                <input id="usuario" name="usuario" type="text" placeholder="Digite o seu Usuário"  class="form-control input-md" required="" maxlength="50">

            </div>
        </div>


        <div class="form-group">
            <label class="col-md-4 control-label" for="senha">Senha</label>
            <div class="col-md-4">
                <input id="senha" name="senha" type="password" placeholder="" class="form-control input-md" required="" maxlength="64">

            </div>
        </div>

        

        <div class="form-group">
            <label class="col-md-4 control-label" for="nivel">Nivel</label>
            <div class="col-md-4">
                <select id="nivel" name="nivel" class="form-control">
                    <option disabled="">Selecione</option>
                    <option value="1">Administrador</option>
                    <option value="2">Usuario</option>
                </select>
            </div>
        </div>


    </fieldset>
    <br/>
    <fieldset>
        <div class="form-group"><legend> Dados Pessoais </legend></div>


        <div class="form-group">
            <label class="col-md-4 control-label" for="nome">Nome</label>  
            <div class="col-md-5">
                <input id="nome" name="nome" type="text" placeholder="Digite o Nome" class="form-control input-md" required="" maxlength="45">

            </div>
        </div>


        <div class="form-group">
            <label class="col-md-4 control-label" for="matricula">Matrícula</label>  
            <div class="col-md-4">
                <input id="matricula" name="matricula" type="text" placeholder="Digite a Matricula" class="form-control input-md" required="">

            </div>
        </div>


        <div class="form-group">
            <label class="col-md-4 control-label" for="sexo">Sexo</label>
            <div class="col-md-4">
                <div class="radio">
                    <label for="sexo-0">
                        <input type="radio" name="sexo" id="sexo-0" value="M" checked="checked">
                        Masculino
                    </label>
                </div>
                <div class="radio">
                    <label for="sexo-1">
                        <input type="radio" name="sexo" id="sexo-1" value="F">
                        Feminino
                    </label>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label" for="dataNascimento">Data de Nascimento</label>  
            <div class="col-md-4">
                <input id="dataNascimento" name="dataNascimento" type="date" placeholder="" class="form-control input-md" required="" min="1930-01-01" max="2000-01-01">

            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label" for="dataAdmissao">Data de Admissão</label>  
            <div class="col-md-4">
                <input id="dataAdmissao" name="dataAdmissao" type="date" placeholder="" class="form-control input-md" required="" min="2000-01-01" max="2015-11-26">

            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label" for="rg">RG</label>  
            <div class="col-md-4">
                <input id="rg" name="rg" type="text" placeholder="Digite seu RG" class="form-control input-md" required="" maxlength="20">

            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label" for="cpf">CPF</label>  
            <div class="col-md-4">
                <input id="cpf" name="cpf" type="text" placeholder="Digite Seu CPF" class="form-control input-md" required="" maxlength="14">

            </div>
        </div>




    </fieldset>

    <br/>
    <fieldset>


        <div class="form-group"><legend> Endereço</legend></div>


        <div class="form-group">
            <label class="col-md-4 control-label" for="logradouro">Logradouro</label>  
            <div class="col-md-4">
                <input id="logradouro" name="logradouro" type="text" placeholder="Digite o Logradouro" class="form-control input-md" required="" maxlength="45">

            </div>
        </div>


        <div class="form-group">
            <label class="col-md-4 control-label" for="numero">Numero</label>  
            <div class="col-md-4">
                <input id="numero" name="numero" type="text" placeholder="Digite o Numero" class="form-control input-md" required="" max="45">

            </div>
        </div>


        <div class="form-group">
            <label class="col-md-4 control-label" for="complemento">Complemento</label>  
            <div class="col-md-4">
                <input id="complemento" name="complemento" type="text" placeholder="Digite o Complemento" class="form-control input-md" max="45">

            </div>
        </div>


        <div class="form-group">
            <label class="col-md-4 control-label" for="bairro">Bairro</label>  
            <div class="col-md-4">
                <input id="bairro" name="bairro" type="text" placeholder="Digite o Bairro" class="form-control input-md" required="" max="45">

            </div>
        </div>


        <div class="form-group">
            <label class="col-md-4 control-label" for="cidade">Cidade</label>  
            <div class="col-md-4">
                <input id="cidade" name="cidade" type="text" placeholder="Digite a Cidade" class="form-control input-md" required="" maxlength="45">

            </div>
        </div>


        <div class="form-group">
            <label class="col-md-4 control-label" for="uf">UF</label>
            <div class="col-md-4">
                <select id="uf" name="uf" class="form-control">
                    <option disabled="">Selecione</option>
                    <option value="AC">AC</option>
                    <option value="AL">AL</option>
                    <option value="AP">AP</option>
                    <option value="AM">AM</option>
                    <option value="BA">BA</option>
                    <option value="CE">CE</option>
                    <option value="DF">DF</option>
                    <option value="ES">ES</option>
                    <option value="GO">GO</option>
                    <option value="MA">MA</option>
                    <option value="MT">MT</option>
                    <option value="MS">MS</option>
                    <option value="MG">MG</option>
                    <option value="PA">PA</option>
                    <option value="PB">PB</option>
                    <option value="PR">PR</option>
                    <option value="PE">PE</option>
                    <option value="PI">PI</option>
                    <option value="RJ">RJ</option>
                    <option value="RN">RN</option>
                    <option value="RS">RS</option>
                    <option value="RO">RO</option>
                    <option value="RR">RR</option>
                    <option value="SC">SC</option>
                    <option value="SP">SP</option>
                    <option value="SE">SE</option>
                    <option value="TO">TO</option>
                </select>
            </div>
        </div>


        <div class="form-group">
            <label class="col-md-4 control-label" for="cep">CEP</label>  
            <div class="col-md-4">
                <input id="cep" name="cep" type="text" placeholder="Digite o CEP" class="form-control input-md" required="">

            </div>
        </div>



    </fieldset>
    <br/>
    <fieldset>

        <div class="form-group"><legend> Cargo</legend></div>

        <div class="form-group">
            <label class="col-md-4 control-label" for="cargo">Cargo</label>  
            <div class="col-md-4">
                <input id="cargo" name="nomeCargo" type="text" placeholder="Digite o Cargo" class="form-control input-md" required="" maxlength="45">

            </div>
        </div>


        <div class="form-group">
            <label class="col-md-4 control-label" for="salario">Salário R$</label>  
            <div class="col-md-4">
                <input id="salario" name="salario" type="text" placeholder="Digite o Salário" class="form-control input-md" required="">

            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label" for="cadastrar"></label>
            <div class="col-md-8">

                <button id="limpar" type="reset" name="limpar" class="btn btn-inverse">Limpar</button>
                <button  type="submit" name="cadastrar" class="btn btn-warning" >Cadastrar</button>
            </div>
        </div>

    </fieldset>
    
</form>
<div id="retorno"></div>
<br/>
<br/>


<?php

include_once "footer.php";
?>