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
        <a href="#" class="btn btn-primary btn-custom">
            <span  class="btn-icon  rounded-circle fas fa-check "></span> Acessar
        </a>   
        <a href="#" class="btn btn-success btn-custom">
            <span  class="btn-icon  rounded-circle fas fa-sync "></span> Atualizar
        </a> 
        <a href="#" class="btn btn-danger btn-custom">
            <span  class="btn-icon  rounded-circle fas fa-trash-alt"></span> Apagar
        </a> 







        <div class="modal fade" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Trocar Imagem</h4>
                        <button type="button" class="close" data-dismiss="modal">×</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">

                        <form method="post"  action="upload.php" enctype="multipart/form-data">
                            <input type="file" required name="arquivo"> 


                            <input class="btn btn-danger" type="submit" >
                        </form>

                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button      type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>

                </div>



            </div>
        </div>































        <div class="container">
            <div class="container mt-3">
                <h2>Contato</h2>
                <div id="myCarousel" class="carousel slide">

                    <!-- Indicators -->
                    <ul class="carousel-indicators">
                        <li class="item1 active"></li>
                        <li class="item2"></li>
                        <li class="item3"></li>
                    </ul>

                    <!-- The slideshow -->
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="imagens/a.jpg" alt="Los Angeles" width="1100" height="500">
                        </div>
                        <div class="carousel-item">
                            <img src="imagens/b.jpg" alt="Chicago" width="1100" height="500">
                        </div>
                        <div class="carousel-item">
                            <img src="imagens/c.jpg" alt="New York" width="1100" height="500">
                        </div>
                    </div>

                    <!-- Left and right controls -->
                    <a class="carousel-control-prev" href="#myCarousel">
                        <span class="carousel-control-prev-icon  "></span>
                    </a>
                    <a class="carousel-control-next" href="#myCarousel">
                        <span class="carousel-control-next-icon"></span>
                    </a>
                </div>
            </div>

            <br>
            <div class="row">

                <div class="col ">
                    <form action="/action_page.php" class="needs-validation" novalidate>
                        <div class="form-group">
                            <label for="Email">Email:</label>
                            <input type="email" class="form-control" id="Email" placeholder="Digite seu Email:" name="email" required>
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">Please fill out this field.</div>
                        </div>
                        <div class="form-group">
                            <label for="Nome">Nome:</label>
                            <input type="text" class="form-control" id="Nome" placeholder="Digite seu Nome:" name="uname" required>
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
                            <textarea class="form-control" rows="5" id="Escreva seus Comentarios" placeholder="Digite seus Comentarios:" name="comentarios" required ></textarea>
                        </div>
                        <div class="row justify-content-end" style="padding-left:15px;padding-right:15px;">
                            <button type="submit" class="btn btn-primary btn-block">Enviar</button>    
                        </div>
                    </form> 





                </div>
            </div></div>
        <br> 

        <script>
            $(document).ready(function () {
                // Activate Carousel
                $("#myCarousel").carousel();

                // Enable Carousel Indicators
                $(".item1").click(function () {
                    $("#myCarousel").carousel(0);
                });
                $(".item2").click(function () {
                    $("#myCarousel").carousel(1);
                });
                $(".item3").click(function () {
                    $("#myCarousel").carousel(2);
                });

                // Enable Carousel Controls
                $(".carousel-control-prev").click(function () {
                    $("#myCarousel").carousel("prev");
                });
                $(".carousel-control-next").click(function () {
                    $("#myCarousel").carousel("next");
                });
            });
        </script>

        <script>
            // Disable form submissions if there are invalid fields
            (function () {
                'use strict';
                window.addEventListener('load', function () {
                    // Get the forms we want to add validation styles to
                    var forms = document.getElementsByClassName('needs-validation');
                    // Loop over them and prevent submission
                    var validation = Array.prototype.filter.call(forms, function (form) {
                        form.addEventListener('submit', function (event) {
                            if (form.checkValidity() === false) {
                                event.preventDefault();
                                event.stopPropagation();
                            }
                            form.classList.add('was-validated');
                        }, false);
                    });
                }, false);
            })();
        </script>

    </body>
</html>

