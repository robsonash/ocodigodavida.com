<?php
session_start();
if ((!isset($_SESSION['usuario']) == true) and ( !isset($_SESSION['senha']) == true)) {
    unset($_SESSION['usuario']);
    unset($_SESSION['senha']);
    unset($_SESSION['status']);
    header('location:index.php');
}
$status = $_SESSION['status'];
if (($status == '2')) {
    header('location:home.php');
}
include_once("conexao.php");
include_once("uploadpost.php");
$conexao = conectar();
$idusuario = $_SESSION['idusuario'];
$imagem = $_SESSION['imagem'];
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
        <script src="ckeditor/ckeditor.js"></script>
        <script src="ckeditor/adapters/jquery.js"></script>
        <script>
                    $(document).ready(function () {
            $('textarea#textopost').ckeditor();
            });</script>
        <style>
            body{
                padding: 10px;
position: relative;
            }
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
            form{
                width: 100%;
            }
            @font-face{
                font-family: "arial-rounded-mt-light";
                src: url('fonts/arial-rounded-mt-light.ttf');
            }
            h1{ font-family: 'Mali', cursive;

            }
            h2{ font-family: 'Mali', cursive;
            }
            p{
                font-family: 'Mali', cursive;
            }
            .area {
                border-radius: 4px;
                box-shadow: 1px 0px 4px 0px #33ff33;
                background: #ffffff;
                border: 2px solid #009966;
                width: 100%;        

                .rowsem{ margin-right: none;margin-left: none;
                         }


                         }
                         .efeito:hover{
                         cursor:pointer;
                         color:  #00ccff;
                         box-shadow: 1px 1px 10px;
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
<?php include_once("menu.php");?>


     
          




                <div class="container">
               <?php
                if (isset($_SESSION['msgadmin'])) {
                    echo $_SESSION['msgadmin'];
                    unset($_SESSION['msgadmin']);
                }
                
                ?>

                    <div class="row">
                
                        <h1>Cadastre a postagem</h1>
                    </div>
                    <form  method="post" action="postagem.php" enctype="multipart/form-data">
                        <div class="form-group">
                            <p>Clique para fazer upload da imagem<br></p><input class="form-control" type="file" required name="arquivo" >
                        </div>
                        <div class="form-group">
                            <p>Titulo<br></p><input  class="form-control" type="text" name="nomepost" id="nomepost"  placeholder="Titulo">
                        </div>
                        <div class="form-group">
                            <p>Descrição<br></p><input  class="form-control" type="text"  name="descricaopost" id="descricaopost"  placeholder="Descrição">             
                        </div>
                        <div class="form-group">
                            <p>Status <br></p>
                            <select class="form-control" type="text" name="statuspost" id="statuspost"  placeholder="Status">
                                <option value="1">Secundario</option>



                            </select>
                        </div>

                        <div class="form-group">          
                            <input class="form-control"type="hidden" name="idusuario" id="statuspost"  placeholder="idusuario" value="<?php print " $idusuario"; ?>">               
                            <p><a href="pastaimagem.php">Pasta Imagem </a></p>
                            <p><a href="postagens.php">Postagens</a></p>             
                            <p><a href="Login.php">Login</a></p> 
                        </div>
                        <div class="form-group">    
                            <p>Texto<br></p>
                            <textarea class="form-control" name="textopost" id="textopost"></textarea>
                            <script src="ckeditor/ckeditor.js"></script>
                            <script>
                    CKEDITOR.replace('textopost');</script>
                            <p> <input name="salvar"  type="submit" ></p>
                        </div>
                    </form>
                </div>  


            



           
            <?php include_once("./footer/footer.php"); ?>
        </body>
        <script src= "jquery-3.4.1.min.js" ></script>
        <script>
                    function inicialmodal (modalID){
                    const modal = document.getElementById(modalID);
                            if (modal){
                    modal.classList.add('mostrar');
                            modal.addEventListener('click', (e) = > {
                            if (e.target.id == modalID || e.target.className == 'fechar'){
                            modal.classList.remove ('mostrar');
                            }
                            });
                    }}
            const trocar = document.querySelector('.trocar');
                    trocar.addEventListener('click', () = > inicialmodal('modal_imagem'));</script>
        <script src= "seleimagem.js" ></script>





    </html>