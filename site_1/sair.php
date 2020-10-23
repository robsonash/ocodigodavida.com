<?php
session_start();
unset( $_SESSION['idusuario'] ,
     $_SESSION['nome'] ,
    $_SESSION['usuario'] ,
    $_SESSION['senha'] ,
    $_SESSION['status'] ,
    $_SESSION['imagem']);
$_SESSION['msgdeslogado'] = "<div class='alert alert-success'>Deslogado com sucesso!</div>";
header("Location:login.php");
exit();
session_destroy();