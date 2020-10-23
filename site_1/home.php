<?php
session_start();
include_once("conexao.php");
$conexao = conectar();
$url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
include_once("verificação.php");



if ($p = isset($_GET['p'])) {

    $p = $_GET['p'];
    $sql = "SELECT postagem.*,usuarios.* FROM postagem
INNER JOIN usuarios ON postagem.idusuario = usuarios.idusuario WHERE idpostagem = $p ";
    $consulta = mysqli_query($conexao, $sql);
    global $filtro;
    $articles = array();
    while ($row = mysqli_fetch_assoc($consulta)) {
        $articles[] = $row;
        $linhas = mysqli_affected_rows($conexao);
    }
    $idpostagem = $p;
    $sql1 = "SELECT * FROM postagem order by idpostagem desc limit 5";
$consulta1 = mysqli_query($conexao, $sql1);
$a = array();
while ($row = mysqli_fetch_assoc($consulta1)) {
    $a[] = $row;
    $linhas = mysqli_affected_rows($conexao);
}
 $sql2 = "SELECT postagem.idpostagem,postagem.nomepost,comentario.*,usuarios.imagem,usuarios.idusuario, usuarios.nome FROM comentario
INNER JOIN usuarios ON comentario.idusuario = usuarios.idusuario
INNER JOIN postagem ON postagem.idpostagem = comentario.idpostagem  where postagem.idpostagem = $p order by idcomentario";
    $consulta2 = mysqli_query($conexao, $sql2);
    $c = array();
    while ($row = mysqli_fetch_assoc($consulta2)) {
        $c[] = $row;
        $linhas = mysqli_affected_rows($conexao);
    }
include_once './posthome/post.php';   
} else {
    include_once './posthome/index.php'; 
}
?>
