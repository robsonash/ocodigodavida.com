<?php
session_start();
$nome = isset($_POST['nome']) ? $_POST['nome'] : "";
$usuario = isset($_POST['usuario']) ? $_POST['usuario'] : "";
$usuario = strtolower($usuario);
$assunto = isset($_POST['assunto']) ? $_POST['assunto'] : "";
$comentario = isset($_POST['comentario']) ? $_POST['comentario'] : "";
$to = "robsoncs211@gmail.com";
$subject = "Email enviado de  $usuario";
$headers = "MIME-Version: 1.1\n";
$headers .= "Content-type: text/html; charset=utf-8\n";
$headers .= "From:" . $usuario . "\r\n";
$message .= $comentario;
$sentmail = mail($to, $subject, $message, $headers);
if ($sentmail) {
    $_SESSION['msg1'] = '<div class="alert   alert-success alert-dismissible fade show" role="alert">
   Email enviado
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
    header("Location:contato.php");
    exit();
}else{
    $_SESSION['msg1'] = '<div class="alert   alert-danger alert-dismissible fade show" role="alert">
   Não foi possivel enviar seu email
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
    header("Location:contato.php");
    exit();
}

