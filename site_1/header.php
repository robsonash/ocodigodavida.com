<?php


include_once("conexao.php");
$conexao = conectar();

//$articles = f();
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
            });
        </script>
    </head>
    <body>



        <div class="menu">
            <div class="menucol1"> 
        </div>
        <div class="menucol2">
            <ul class="menulinks" >
                <li><a  href="http://localhost/site_1/">home</a></li>
                <li><a  href="http://localhost/site_1/login">Login</a></li>
                <li><a href="http://localhost/site_1/contato">Contato</a></li>
            </ul>
        </div>
    </div>