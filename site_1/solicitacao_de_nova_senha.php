<?php
session_start();
include_once("conexao.php");
$conexao = conectar();
$usuario = isset($_POST['usuario']) ? $_POST['usuario'] : "";
$usuario = strtolower($usuario);
$trocadesenha = md5(uniqid(rand()));
$sql = "SELECT idusuario,usuario FROM usuarios where usuario = '$usuario'";
$salvar = mysqli_query($conexao, $sql);
$linhas = mysqli_affected_rows($conexao);
if ($linhas > 0) {
$sql1 = "update `usuarios` SET `trocadesenha` = '$trocadesenha' WHERE (`usuario` = '$usuario')";
$salvar = mysqli_query($conexao, $sql1);
$linha = mysqli_affected_rows($conexao);
  if ($linha > 0) {
    $to = $usuario;
    $subject = "Confirmação o codigo da vida troca de senha para $usuario";
    $headers = "MIME-Version: 1.1\n";
    $headers .= "Content-type: text/html; charset=utf-8\n";
    $headers .= "From: robsoncs211@gmail.com\r\n";
    $message ="Por favor clique no link abaixo para trocar a senha. \n ";
    $message .= "<a href=\"http://localhost/site_1/confirmar_troca_de_senha.php?senhakey=$trocadesenha \">Clique para a troca de senha</a>";
    $sentmail = mail($to, $subject, $message, $headers);
    if ($sentmail) {
$_SESSION['msgtrocaenviado'] = '<div class="alert   alert-success alert-dismissible fade show" role="alert">
  Foi enviado um e-mail de troca de senha para o seu endereço de e-mail.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>'; 
  fecharconexao($conexao);
  header('location:Login.php');
     exit();
      
    } else {
        echo "
            <script language='JavaScript'>
            window.alert('Não foi possível enviar um e-mail de troca de senha para o seu endereço de e-mail. Clique para voltar à página de login.')
            window.location.href='Login.php';
            </script>";
    }
}else{
    print"nao foi feita a atualização";
}
    }
else{ 
  $_SESSION['msgnaobd'] = '<div class="alert   alert-danger alert-dismissible fade show" role="alert">
  Este usuario nao esta cadastrado no banco de dados
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>'; 
  fecharconexao($conexao);
     header('location:esqueci_minha_senha.php');
     exit();
}





    