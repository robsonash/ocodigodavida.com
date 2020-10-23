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
        <script src="jquery-3.4.1.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
        <script src="https://unpkg.com/ionicons@5.0.0/dist/ionicons.js"></script>
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
            .carousel-inner img {
                width: 100%;
                height: 100%;
            }
            .btn-custom {
                padding: 1px 15px 3px 2px;
                border-radius: 50px;
            }

            .btn-icon {

                padding: 8px;
                background: #ffffff;

            }
            .fa-check{
                color: #0079f7;
            }
            .fa-sync{
                color: #28a745;
            }
           .fa-trash-alt{
                color: #dc3545;
            }

        </style>
    </head>
    <body>
    <?php include_once("menu.php");?>
        <div class="container">
           
                <div class="d-flex justify-content-center"> 
                    <h2>Contato</h2>
                </div> 
             <div> 
                      <?php if (isset($_SESSION  ['msg1'])) {
                    echo $_SESSION ['msg1'];
                    unset($_SESSION ['msg1']);
                }?> </div> 
            <br>
            <div class="row">
                <div class="col ">
                    <form action="email.php" method="post" >
                        <div class="form-group">
                            <label for="Email">Email:</label>
                            <input type="email" class="form-control" id="Email" placeholder="Digite seu Email:" name="usuario" required>
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">Please fill out this field.</div>
                        </div>
                        <div class="form-group">
                            <label for="Nome">Nome:</label>
                            <input type="text" class="form-control" id="Nome" placeholder="Digite seu Nome:" name="nome" required>
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">Please fill out this field.</div>
                        </div>
                        <div class="form-group">
                            <label for="Assunto">Assunto:</label>
                            <input type="text" class="form-control" id="Assunto" placeholder="Digite o Assunto:" name="assunto" required>
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">O campo nao pode ficar em branco.</div>
                        </div>
                        <div class="form-group">
                            <label for="Comentarios">Comentarios:</label>
                            <textarea class="form-control" rows="5" id="Escreva seus Comentarios" placeholder="Digite seus Comentarios:" name="comentario" required ></textarea>
                        </div>
                        <div class="row justify-content-end" style="padding-left:15px;padding-right:15px;">
                            <button type="submit" class="btn btn-primary btn-block">Enviar</button>    
                        </div>
                    </form> 
                </div>
            </div></div>
        <br> 
    </body>
</html>

