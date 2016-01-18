
<?php
$page_title = "Login - Sistema Empresa";
include_once "header.php";
?>

<div id="msgerro"  style="display: none;" class="alert alert-danger alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        Usuário ou senha inválidas!
</div>

<form id="logar_form" action="logar.php" method="post" class="form-horizontal">
    <fieldset>


        <div class="form-group">
            <label class="col-md-4 control-label" for="usuario">Usuário</label>  
            <div class="col-md-4">
                <input id="Usuário" name="usuario" type="text" placeholder="Digite o seu Usuário" class="form-control input-md" required="">

            </div>
        </div>


        <div class="form-group">
            <label class="col-md-4 control-label" for="senha">Senha</label>
            <div class="col-md-4">
                <input id="senha" name="senha" type="password" placeholder="" class="form-control input-md" required="">

            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label" for="entrar"></label>
            <div class="col-md-8">
                <button id="entrar" type="submit"name="entrar" class="btn btn-success">Entrar</button>
                <button id="limpar" type="reset" name="limpar" class="btn btn-inverse">Limpar</button>
            </div>
        </div>
       
    </fieldset>
</form>

<?php
include_once "footer.php";
?>
w