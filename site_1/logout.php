<?php
session_start();
unset( $_SESSION['idusuario'] ,
     $_SESSION['nome'] ,
    $_SESSION['usuario'] ,
    $_SESSION['senha'] ,
    $_SESSION['status'] ,
    $_SESSION['imagem']);
$_SESSION['msgdeslogado'] = '<div class="alert   alert-success alert-dismissible fade show" role="alert">
  Deslogado com sucesso!
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
header("Location:login.php");
exit();
session_destroy();
 