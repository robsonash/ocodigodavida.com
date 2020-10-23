<?php
session_start();
include_once("conexao.php");
$conexao = conectar();
$p = isset($_POST['p']) ? $_POST['p'] : "";
$idusuario = $_SESSION['idusuario'];
$status = $_SESSION['status'];
$nome = $_SESSION['nome'];
$textocomentario = isset($_POST['textocomentario']) ? $_POST['textocomentario'] : "";
$idpostagem = isset($_POST['idpostagem']) ? $_POST['idpostagem'] : "";
$status = isset($_POST['status']) ? $_POST['status'] : "";
$nome = isset($_POST['nome']) ? $_POST['nome'] : "";
$sql = "insert into comentario (`textocomentario`,`datacomentario`,`idpostagem`,`idusuario`) values ('$textocomentario',now(),'$idpostagem','$idusuario')";
$salvar = mysqli_query($conexao, $sql);
$linhas = mysqli_affected_rows($conexao);
if ($linhas > 0) {
    print"ja cadastrou ";
} else {
    print"nao cadastrou";
}
if ($p) {
    header("Location: http://localhost/site_1/?p=" . $p);
} else {
 $_SESSION['msg'] = '<div class="alert   alert-danger alert-dismissible fade show" role="alert">
   Voçe não esta logado 
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
     header("Location: http://localhost/site_1/");
    exit;
}


