<?php
$p = isset($_POST['p']) ? $_POST['p'] : "";
include_once("conexao.php");
$conexao = conectar();
$idcomentario = isset($_POST['idcomentario']) ? $_POST['idcomentario'] : "";
$sql = "DELETE FROM comentario WHERE (idcomentario = $idcomentario)";
$consulta = mysqli_query($conexao, $sql);
$linhas = mysqli_affected_rows($conexao);
if ($linhas > 0) {
    if ($p) {
        header("Location: http://localhost/site_1/?p=" . $p);
    } else {
        header("Location: http://localhost/site_1/");
    }
} else {
    echo "<script> alert('Não excluiu!')</script>";
    echo "$idcomentario";
}


