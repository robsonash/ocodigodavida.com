<?php
session_start();
if ((!$_SESSION['usuario'] == true) and ( !$_SESSION['trocadesenha'] == true)) {
    unset($_SESSION['usuario']);
    unset($_SESSION['senha']);
    unset($_SESSION['status']);
    header('location:Login.php');
}
include_once("conexao.php");
$conexao = conectar();
$usuario = $_SESSION['usuario'];
$trocadesenha = $_SESSION['trocadesenha'];
$idusuario = $_SESSION['idusuario'];
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
            @media  screen and (max-width: 360px){
                .layout{
                    padding: 20px 0; 
                    height: 91.3vh;
                    background-image: none;
                    background-color: #000;
                }
                form{
                    height: 100%;
                    padding: 10px;
                }
            }

        </style>
    </head>
    <body>
        <nav class="navbar navbar-expand-md bg-dark navbar-dark " id="logado">
            <?php
            if ((!isset($_SESSION['usuario']) == true) and ( !isset($_SESSION['senha']) == true)) {
                unset($_SESSION['usuario']);
                unset($_SESSION['senha']);
                unset($_SESSION['status']);
                unset($_SESSION['imagem']);
            }
            if ((isset($_SESSION['usuario']) == true) and ( isset($_SESSION['senha']) == true)) {

                $idusuario = ($_SESSION['idusuario']);
                $usuario = ($_SESSION['usuario']);
                $status = ($_SESSION['status']);
                $imagem = ($_SESSION['imagem']);
                print"<div class='navbar-brand'><p>  <img class='imgbolinha' src='upload/" . ((empty($imagem)) ? 'nada.jpg' : $imagem ) . "'  > </p>"
                        . "<p >     $usuario <br>
            <a  href='financas.php'>Finanças</a>
            <a  href='logout.php'>Sair <br></a>
            </p>
           </div>";
            }
            ?>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="collapsibleNavbar">
                <ul class="navbar-nav ">
                    <li class="nav-item">
                        <a class="nav-link" href="http://localhost/site_1/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="http://localhost/site_1/login">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="http://localhost/site_1/contato">Contato</a>
                    </li>    
                </ul>
            </div>  
        </nav>


        <div class="layout">
            <form  method="post" action="salvasenha.php">   
                <div class="ilustra"> 
                    <i class="fas fa-users"></i>
                </div>
                <h2 style="font-family: sans-serif;color:#ffffff; "class="text-center">Nova senha</h2>
                  <?php if(isset($_SESSION['msg1'])){
			echo $_SESSION['msg1'];
			unset($_SESSION['msg1']);
		}
                if(isset($_SESSION['msg2'])){
			echo $_SESSION['msg2'];
			unset($_SESSION['msg2']);
		}
                if(isset($_SESSION['msg3'])){
			echo $_SESSION['msg3'];
			unset($_SESSION['msg3']);
		}
                if(isset($_SESSION['msg4'])){
			echo $_SESSION['msg4'];
			unset($_SESSION['msg4']);
		} 
                     if(isset($_SESSION['msgsenha'])){
			echo $_SESSION['msgsenha'];
			unset($_SESSION['msgsenha']);
		}  
                    if(isset($_SESSION['msgtoken'])){
			echo $_SESSION['msgtoken'];
			unset($_SESSION['msgtoken']);
		}  
		?>
                <div class="form-group"> 
                    <div class="input-group input-group-lg"> 
                        <div class="input-group-prepend"> 
                            <span class="input-group-text">
                                <i class="fas fa-lock"></i>
                            </span> 
                        </div> 
                        <input name="senha" type="password" class="form-control" placeholder="Senha"> 
                        <input  type="hidden"  name="idusuario" id="idusuario" value="<?php print "$idusuario"; ?>">
                        <input  type="hidden"  name="usuario" id="usuario" value="<?php print "$usuario"; ?>">
                        <input  type="hidden"  name="trocadesenha" id="trocadesenha" value="<?php print "$trocadesenha"; ?>">
                    </div>
                </div> 
                <button style="margin-bottom:10px;"type="submit" class="btn btn-block btn-primary">Salvar</button>
                <a  class="linkss" href="Login.php"> &nbsp &nbsp; Login </a>
                <a class="linkss" href="cadastrausuario.php"> &nbsp &nbsp; ou Cadastre-se </a>
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

