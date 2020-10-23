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
                background-image: url(http://localhost/site_1/imagens/dark.jpg);
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
            }
            
        </style>

    </head>
    <body>

    <?php include_once("menu.php");?>

 
              <div class="layout">
                 
                  <form  method="post" action="processacadastro.php" enctype="multipart/form-data">
                <div class="ilustra"> 
                    <i class="fas fa-users"></i>
                </div>
                <h2 style="font-family: sans-serif;color:#ffffff; "class="text-center">Cadastro</h2>
                
                
                
                
                
                
                    <?php 
                     if(isset($_SESSION['msgenviado'])){
			echo $_SESSION['msgenviado'];
			unset($_SESSION['msgenviado']);
                        unset($_SESSION['msg12']);
                        unset($_SESSION['msg4']);
                        unset($_SESSION['msg3']);
                        unset($_SESSION['msg2']);
                        unset($_SESSION['msg1']);
                        unset($_SESSION['msgnao']);
                     }
                    if(isset($_SESSION['msg12'])){
			echo $_SESSION['msg12'];
			unset($_SESSION['msg12']);
                        unset($_SESSION['msg4']);
                        unset($_SESSION['msg3']);
                        unset($_SESSION['msg2']);
                        unset($_SESSION['msg1']);
                        unset($_SESSION['msgnao']);
		} else{
                         if(isset($_SESSION['msgnao'])){
			echo $_SESSION['msgnao'];
			unset($_SESSION['msgnao']);
		}
                if(isset($_SESSION['msg1'])){
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
                }   }         
		?>
                
                
                
                
                
                
                
                
                
                
                
                
                <div class="form-group"> 
                    <div class="input-group input-group-lg"> 
                        <div class="input-group-prepend"> 
                            <span class="input-group-text" style="
    margin-bottom: 16px;">
                                <i class="fas fa-user"></i>
                            </span> 
                        </div> 
              <input name="nome"  style="margin-bottom: 16px;" type="text" class="form-control" placeholder="Nome" required > 
                    </div>
                    <div class="input-group input-group-lg"> 
                        <div class="input-group-prepend"> 
                            <span class="input-group-text">
                           <i class="fas fa-envelope"></i>
                            </span> 
                        </div> 
                        <input name="usuario" type="email" class="form-control" placeholder="Email" required> 
                    </div>
                </div> 
                <div class="form-group"> 
                    <div class="input-group input-group-lg"> 
                        <div class="input-group-prepend"> 
                            <span class="input-group-text">
                                <i class="fas fa-lock"></i>
                            </span> 
                        </div> 
                        <input name="senha" type="password" class="form-control" placeholder="Senha" required> 
                    </div>
                </div> 
                <button style="margin-bottom:10px;"type="submit" class="btn btn-block btn-primary">Cadastrar</button>
                
                <a  class="linkss" href="Login.php"> &nbsp &nbsp; Voltar </a>
            </form>
        </div>

                          


                         
                        
                    

                
            
       

        <script>
$( document ).ready(function() {

$( ".cross" ).hide();
$( ".ulmobile" ).hide();
$( ".hamburger" ).click(function() {
$( ".ulmobile" ).slideToggle( "slow", function() {
$( ".hamburger" ).hide();
$( ".cross" ).show();
});
});

$( ".cross" ).click(function() {
$( ".ulmobile" ).slideToggle( "slow", function() {
$( ".cross" ).hide();
$( ".hamburger" ).show();
});
});
});
</script>

    </body>
</html>

