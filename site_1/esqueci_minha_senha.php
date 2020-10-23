<?php
session_start();
include_once("conexao.php");
$conexao = conectar();
include_once("verificação.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>O Código da Vida</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link href="https://fonts.googleapis.com/css?family=Mali&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="jquery-3.4.1.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
        <style>
            .imgbolinha{
                cursor: pointer;
                border-radius: 50px;
                width: 50px;
                height: 50px;}
            .navbar-brand{
                float: left ;
                height: 60px;
            }
            .navbar-brand  p{
                color: #ff6666; float: left;
            }
            .navbar-brand  a{
                color: #cccc00;
            }
            .layout{
                padding:80px 0;
                background-image: url(https://www.ocodigodavida.com/imagens/fundo%20degrade%20-%20Verde.png);
                background-repeat: no-repeat;
                height: 92.6vh;
            }
            form{
                max-width:400px;width: 90%;
                margin:0 auto;padding: 40px;
                background-color:#000; 
                box-shadow:1px 1px 5px rgba(0,0,0,0.1);


            }
            .ilustra{
                text-align: center;
                font-size: 100px;
                color: rgb(244,71,107);
            }
            .input-group-text{
                color:#ffffff;
                background:#74c7ac;
            }
            .linkss a:hover{
                text-decoration: none !important;
                list-style: none !important;
                color:#3333ff;
            }
            @media  screen and (max-width: 700px){
                body{
                    position:relative;
                }
                .layout{
                    display: flex; 
                    background-image: none;
                    align-items: center;
                    height: 100vh;
                    justify-content: center;
                    background-color: #000;
                }
                form {margin-top: -90px!important;
                       max-width: 400px;
                       width: 90%;
                       margin: 0 auto;
                       padding: 40px;
                       background-color: #000;
                       box-shadow: 1px 1px 5px rgba(0,0,0,0.1);
                       margin-top: -90px!important;
                }

            </style>

        </head>
        <body>

            <?php include_once("menu.php"); ?>
            <div class="layout">
                <form  method="post" action="solicitacao_de_nova_senha.php">
                    <div class="ilustra"> 
                        <i class="fas fa-users"></i>
                    </div>
                    <h2 style="font-family: sans-serif;color:#ffffff; "class="text-center">Solicitação de nova senha</h2>
                    <?php
                    if (isset($_SESSION['msgnaobd'])) {
                        echo $_SESSION['msgnaobd'];
                        unset($_SESSION['msgnaobd']);
                    }
                    ?>
                    <div class="form-group"> 
                        <div class="input-group input-group-lg"> 
                            <div class="input-group-prepend"> 
                                <span class="input-group-text">
                                    <i class="fas fa-envelope"></i>
                                </span> 
                            </div> 
                            <input name="usuario" type="email" class="form-control" placeholder="Digite seu email" required> 
                        </div>
                    </div> 
                    <button style="margin-bottom:10px;"type="submit" class="btn btn-block btn-primary">Enviar</button>              
                    <a class="linkss" href="Login.php"> &nbsp &nbsp; Voltar </a>
                </form>
            </div>              
            <script>
                $(document).ready(function () {

                    $(".cross").hide();
                    $(".ulmobile").hide();
                    $(".hamburger").click(function () {
                        $(".ulmobile").slideToggle("slow", function () {
                            $(".hamburger").hide();
                            $(".cross").show();
                        });
                    });

                    $(".cross").click(function () {
                        $(".ulmobile").slideToggle("slow", function () {
                            $(".cross").hide();
                            $(".hamburger").show();
                        });
                    });
                });
            </script>


        </body>
    </html>

