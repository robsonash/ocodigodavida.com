<?php

session_start();
include_once ('conexao.php');
$conexao = conectar();
$senha = isset($_POST['senha']) ? $_POST['senha'] : "";
$usuario = isset($_POST['usuario']) ? $_POST['usuario'] : "";
$trocadesenha = isset($_POST['trocadesenha']) ? $_POST['trocadesenha'] : "";
$idusuario = isset($_POST['idusuario']) ? $_POST['idusuario'] : "";

function cadastro() {
    include_once('conexao.php');
    $conexao = conectar();
    $idusuario = isset($_POST['idusuario']) ? $_POST['idusuario'] : "";
    $trocadesenha = isset($_POST['trocadesenha']) ? $_POST['trocadesenha'] : "";
    $nome = isset($_POST['nome']) ? $_POST['nome'] : "";
    $usuario = isset($_POST['usuario']) ? $_POST['usuario'] : "";
    $senha = isset($_POST['senha']) ? $_POST['senha'] : "";
    $minusculo = 0;
    $maiusculo = 0;
    $numero = 0;
    $pontos = 0;
    $espaço = 0;
    $comcode = md5(uniqid(rand()));
    if (preg_match("/[0-9]/", $senha)) {
        $numero = 1;
        $_SESSION['msg1'] = '<div class="alert   alert-success alert-dismissible fade show" role="alert">
   Com numero
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
    } else {
        $_SESSION['msg1'] = '<div class="alert   alert-danger alert-dismissible fade show" role="alert">
   Sem numero
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
        $numero = 0;
    }
    if (preg_match("/[a-z]/", $senha)) {
        $_SESSION['msg2'] = '<div class="alert   alert-success alert-dismissible fade show" role="alert">
   Com minusculo
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
        $minusculo = 1;
    } else {
        $_SESSION['msg2'] = '<div class="alert   alert-danger alert-dismissible fade show" role="alert">
   A senha presisa ter no minimo uma letra minuscula
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
        $minusculo = 0;
    }
    if (preg_match("/[A-Z]/", $senha)) {
        $_SESSION['msg3'] = '<div class="alert   alert-success alert-dismissible fade show" role="alert">
   Com maiusculo
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
        $maiusculo = 1;
    } else {
        $_SESSION['msg3'] = '<div class="alert   alert-danger alert-dismissible fade show" role="alert">
  A senha presisa ter no minimo uma letra maiuscula
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
        $maiusculo = 0;
    }
    if (preg_match("/[\.\-\_]/", $senha)) {
        $_SESSION['msg4'] = '<div class="alert   alert-success alert-dismissible fade show" role="alert">
   Com caracter especial
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
        $pontos = 1;
    } else {
        $_SESSION['msg4'] = '<div class="alert   alert-danger alert-dismissible fade show" role="alert">
    A senha presisa ter no minimo um caracter especial 
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
        $pontos = 0;
    }
    $senha = preg_replace('/\s+/', '', $senha);
    if (($numero === 1) && ($minusculo === 1) && ($maiusculo === 1) && ($pontos === 1)) {
        //$senha = md5($senha);
        $sql = "update usuarios set senha = '$senha' where idusuario = '$idusuario'";
        $salvar = mysqli_query($conexao, $sql)or die(mysqli_error());
        $linhas = mysqli_affected_rows($conexao);
        if ($linhas > 0) {
            $_SESSION['msgsenha'] = '<div class="alert   alert-success alert-dismissible fade show" role="alert">
   Senha alterada com sucesso!
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
        } else {
            $_SESSION['msgsenha'] = '<div class="alert   alert-danger alert-dismissible fade show" role="alert">
   Não mudou a senha por algum motivo talves vc pois a mesma senha!
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
            header('location:novasenha.php');
            exit;
        }
        $novatoken = md5(uniqid(rand()));
        $sql = "update usuarios set trocadesenha = '$novatoken' where idusuario = '$idusuario'";
        $salvar = mysqli_query($conexao, $sql)or die(mysqli_error());
        $linha = mysqli_affected_rows($conexao);
        if ($linha > 0) {
            $_SESSION['msgtoken'] = '<div class="alert   alert-success alert-dismissible fade show" role="alert">
   Token mudou
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
        } else {
            $_SESSION['msgtoken'] = '<div class="alert   alert-danger alert-dismissible fade show" role="alert">
     Token nao mudou
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
</div>';
        }
       header('location:Login.php');
        exit;
    } else {
        header('location:novasenha.php');
        exit;
    }
}
cadastro();
?>