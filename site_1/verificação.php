<?php

if ((!isset($_SESSION['usuario']) == true) and ( !isset($_SESSION['senha']) == true)) {
    unset($_SESSION['usuario']);
    unset($_SESSION['senha']);
    unset($_SESSION['status']);
    unset($_SESSION['imagem']);
}

if ((isset($_SESSION['usuario']) == true) and ( isset($_SESSION['senha']) == true)){
    
    $idusuario = isset($_SESSION['idusuario']);
    $usuario = isset($_SESSION['usuario']);
    $status = isset($_SESSION['status']);
    $imagem = isset($_SESSION['imagem']);}
