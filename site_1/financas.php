<?php
session_start();
include 'postatudo.php';
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
$articles = f();
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
        <link rel="stylesheet" href="menu.css">
        <link rel="stylesheet" href="estil.css">
        <link rel="stylesheet" href="logado.css">
        <script src="jquery-3.4.1.min.js"></script>
        <script src="ckeditor/ckeditor.js"></script>
        <script src="ckeditor/adapters/jquery.js"></script>
        <script>
                    $(document).ready(function () {
            $('textarea#textopost').ckeditor();
            });</script>
    </head>
    <body>
        <div class="menu">
            <div class="menucol1"> 
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
                    print"<div class='linhausuario'><p class='linhaimg'>  <img class='imgbolinha trocar' src='upload/" . ((empty($imagem)) ? 'nada.jpg' : $imagem ) . "'  > </p>"
                            . "<p class='linhausuarioinfo'>     $usuario <br>
            <a href='admin.php'>Admin</a>
            <a href='logout.php'>Sair <br></a>
            </p>
            </div>";
                }
                ?>

            </div>
            <div class="menucol2">
                <ul class="menulinks" >
                    <li><a  href="http://localhost/site_1/">home</a></li>
                    <li><a  href="http://localhost/site_1/login">Login</a></li>
                    <li><a href="http://localhost/site_1/contato">Contato</a></li>
                </ul>
            </div>
        </div>
            
        <div>
            <h2>Clientes</h2>
            <p><a href="http://localhost/site_1/post.php">post</a></p>
        </div>
      

        <p>Resultado da pesquisa <strong><?php echo $filtro; ?> </strong></p>
        <p><?php echo $registros; ?> Registros encontrados.</p>
        <div class="pesquisar">

            <form  method="get" action=>         
                <label for="filtro">Usuarios</label>
                <input type="text"  name="filtro" id="email">
                <button type="submit" >Procurar</button>

            </form> 
        </div>
        <div class="tabela">

            <table>
                <thead>
                    <tr>
                        <th>Codigo</th>
                        <th>Usuario</th>
                        <th>Status</th>

                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($articles as $row) { ?>

                        <tr>
                            <td><?php echo $row['idusuario']; ?></td>               
                            <td><?php
                                if (empty($row['imagem'])) {
                                    print "<img src='upload/nada.jpg' width='50px' height='50px'style= border-radius:50px;>" . $row['usuario'];
                                } else {


                                    echo "<img src='upload/" . $row['imagem'] . "' width='50px' height='50px' style= border-radius:50px;>" . $row['usuario'];
                                }
                                ?></td>   
                            <td><?php echo $row['status']; ?></td>  
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <div id="modal_imagem" class="modal_container ">
            <div class="modal">
                <h1> upload </h1>
                <button class="fechar">
                    x
                </button>
                <form method="post"  action="upload.php" enctype="multipart/form-data">
                    arquivo: <input type="file" required name="arquivo"> 
                    <input class="btn" type="submit" >
                </form>
            </div>
        </div>
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
                    trocar.addEventListener('click', () = > inicialmodal('modal_imagem'));
        </script>






    </body>

</html>

