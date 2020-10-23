<?php


    include_once("conexao.php");
$conexao = conectar();
    global $registros;
    $filtro = isset($_GET['filtro']) ? $_GET['filtro'] : "";
    $p = $_GET['p'];
    $sql = "SELECT * FROM postagem WHERE idusuario = $p ";
    $consulta = mysqli_query($conexao, $sql);
    global $filtro;
    $articles = array();
    while ($row = mysqli_fetch_assoc($consulta)) {
        $articles[] = $row;
        $linhas = mysqli_affected_rows($conexao);
 
    }
   
    return $articles;
