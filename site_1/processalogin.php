<?php
session_start();
include_once("conexao.php");
$conexao = conectar();
$usuario = isset($_POST['usuario']) ? $_POST['usuario'] : "";
$senha = isset($_POST['senha']) ? $_POST['senha'] : "";
//$senha = md5($senha);
$imagem = isset($_POST['imagem']) ? $_POST['imagem'] : "";
$sql1 = "select *  from usuarios where usuario  COLLATE utf8_bin = '$usuario' and senha  COLLATE utf8_bin = '$senha' and ativo ='1'";
$salvar = mysqli_query($conexao, $sql1);
$linhas = mysqli_affected_rows($conexao);
if ($linhas > 0) {

    session_start();
    $row = mysqli_fetch_assoc($salvar);
    // $row ['imagem'];
    $_SESSION['idusuario'] = $row ['idusuario'];
     $_SESSION['nome'] = $row ['nome'];
    $_SESSION['usuario'] = $row ['usuario'];
    $_SESSION['senha'] = $row ['senha'];
    $_SESSION['status'] = $row ['status'];
    $_SESSION['imagem'] = $row ['imagem'];
    // $_SESSION['idpostagem'] = $row ['idpostagem'];
    //$_SESSION['imagempost'] = $row ['imagempost'];
    if ($row ['status'] == '1') {
        header("Location:admin.php");
        exit;
    }
    if ($row ['status'] == '2') {
        header("Location:home.php");
        exit;
    }
} else {
    $_SESSION['msglog'] = '<div class="alert  alert-danger alert-dismissible fade show" role="alert">
   Login invalido
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
      header("Location:Login.php");
      exit;
}

fecharconexao($conexao);
?>