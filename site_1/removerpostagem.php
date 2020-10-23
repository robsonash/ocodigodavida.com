<?php
session_start();
include_once("conexao.php");
$conexao = conectar();
$idpostagem = isset($_POST['idpostagem']) ? $_POST['idpostagem'] : "";
 $nomedoarquivo = isset($_POST['imagempost']) ? $_POST['imagempost'] : "";
$sql = "delete from `postagem` WHERE (`idpostagem` = '$idpostagem')";
$consulta = mysqli_query($conexao, $sql);
$linhas = mysqli_affected_rows($conexao);
if ($linhas > 0) {
     $excluir = "uploadpostagem/" . $nomedoarquivo;
            if (file_exists($excluir)) {
            unlink($excluir);
            }
              $_SESSION ["msnexcluiupost"] = '<div class="alert   alert-success alert-dismissible fade show" role="alert">
   Excluio o post
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
     header("Location: http://localhost/site_1/post.php");
   exit();
} else {
      $_SESSION ["msnexcluiupost"] = '<div class="alert   alert-danger alert-dismissible fade show" role="alert">
   Não excluiu o post
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
  header("Location: http://localhost/site_1/post.php");
   exit();
}
