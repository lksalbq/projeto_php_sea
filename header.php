<!DOCTYPE html>
<html lang="pt-br">
    <head>

        <meta http-equiv="content-type" content="text/html;charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title><?php echo $page_title; ?></title>


        <style>
            .left-margin{
                margin:0 .5em 0 0;
            }

            .right-button-margin{
                margin: 0 0 1em 0;
                overflow: hidden;
            }
        </style>


        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/estilo.css">


        <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->


        <script src="js/jquery.min.js"></script>

        <script src="js/jquery.maskedinput.min.js"></script>

        <script src="js/jquery.price_format.2.0.min.js"></script>

        <script src="js/jquery.easing.1.3.js"></script>

        <script src="js/bootstrap.min.js"></script>

        <script type="text/javascript">
            //mascara inputs dados pessoais
            jQuery(function ($) {
                $("#cpf").mask("999.999.999-99");
                $("#cep").mask("99.999-999");
                $("#matricula").mask("999999999");
            });
        </script>

        <script type="text/javascript">
            //mascara salario
            jQuery(function ($) {
                $('#salario').priceFormat({
                    prefix: '',
                    centsSeparator: '.',
                    thousandsSeparator: ''
                });
            });
        </script>

        <script type="text/javascript">
            //ajax cadastra formulario
            jQuery(document).ready(function () {
                jQuery('#cadastro').submit(function () {
                    $('html, body').animate({scrollTop: 0}, 'slow');
                    $("#load").html("<img src='img/loader.gif'>");
                    $("#load").fadeIn(100, function () {
                        window.setTimeout(function () {
                            $('#load').fadeOut();
                        }, 1400);
                    });
                    var dados = jQuery(this).serialize();

                    jQuery.ajax({
                        type: "POST",
                        url: "DAOfuncionario.php",
                        data: dados,
                        success: function (data) {

                            $("#msgsucesso").fadeIn(1500, function () {
                                window.setTimeout(function () {
                                    $('#msgsucesso').fadeOut();
                                }, 3999);
                            });

                            setTimeout(function () {
                                location.reload();
                            }, 4000);

                        }
                    });

                    return false;
                });
            });
        </script>

        <script>
            //Ajax edita
            jQuery(document).ready(function () {
                $(document).on('click', '.edit-btn', function () {



                    var matricula = $(this).closest('td').find('.matricula').text();

                    var idcargo = $(this).closest('td').find('.idcargo').text();

                    $('#page-edita').fadeOut(0, function () {
                        $('#page-edita').load('editar_funcionarios.php?matricula=' + matricula + '&' + 'idcargo=' + idcargo, function () {


                            $('#page-edita').fadeIn(0);
                        });
                    });
                });
            });


        </script>
        <script>
            // ajax update
            jQuery(document).ready(function () {
                $(document).on('submit', '#update_form', function () {

                    var update = jQuery(this).serialize();

                    jQuery.ajax({
                        type: "POST",
                        url: "update.php",
                        data: update,
                        success: function (data) {
                            $('#update_form').hide();
                            $("#msgsucessoalt").fadeIn(150, function () {
                                window.setTimeout(function () {
                                    $('#msgsucessoalt').fadeOut();
                                }, 3999);
                            });
                            setTimeout(function () {
                                location.reload();
                            }, 4000);
                        }
                    });
                    return false;
                });
            });
        </script>

        <script>
            //Ajax deleta funcionario
            jQuery(document).ready(function () {
                $(document).on('click', '.delete-btn', function () {

                    if (confirm('Tem certeza que deseja deletar?')) {

                        var matricula = $(this).closest('td').find('.matricula').text();

                        $.post("deletar.php", {matricula: matricula})
                                .done(function (data) {

                                    alert(data + "Matricula:" + matricula);
                                    $("#msgsucessoalt").fadeIn(150, function () {

                                        window.setTimeout(function () {
                                            $('#msgsucessoalt').fadeOut();
                                        }, 3999);
                                    });
                                    setTimeout(function () {
                                        location.reload();
                                    }, 4000);

                                });

                           }
                    });
                });

        </script>


 
    </head>
    <body>
        <div id='page-edita'></div>
        <div class="container">

            <?php
            // show page header
            echo "<div class='page-header'>";
            echo "<h1>{$page_title}</h1>";
            echo "</div>";
            ?>