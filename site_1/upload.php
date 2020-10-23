<?php
session_start();
$idusuario = $_SESSION['idusuario'];
include_once("conexao.php");
$conexao = conectar();
$arquivo = isset($_FILES['arquivo']) ? $_FILES['arquivo'] : "";
if (isset($_FILES['arquivo'])) {
    $nome = $_FILES['arquivo']['name'];
    $diretorio = "upload/";
    $tamanho_maximo = 4000000;
    $temporario_arquivo = $_FILES['arquivo']['tmp_name'];
    $tamanho_arquivo = $_FILES['arquivo']['size'];
    $permitidos = ['jpg', 'jpeg', 'png'];
    $extensao = explode('.', $nome);
    $nome_ = reset($extensao);
    $extensao = end($extensao);
    $novo_nome = md5(time()) . "-$nome_" . '.' . $extensao;
    $usuario = $_SESSION['usuario'];
    if (in_array($extensao, $permitidos)) {
        if ($tamanho_arquivo > $tamanho_maximo) {
            $_SESSION ["msntamanhoexcedido"] =  '<div class="alert   alert-success alert-dismissible fade show" role="alert">
   Tamanho excedido tente por uma imagem menor 
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';   
        header("Location: http://localhost/site_1/admin.php");
          exit();
        } else {
            $sql1 = "SELECT imagem FROM usuarios where usuario = '$usuario'";
            $salvar = mysqli_query($conexao, $sql1);
            $linha = mysqli_affected_rows($conexao);
            $row = mysqli_fetch_assoc($salvar);
            $_SESSION['imagem'] = $row ['imagem'];
            $atualizado = date('d/m/Y H:i:s');
            $nomedoarquivo = $row ['imagem'];
            $excluir = "upload/" . $nomedoarquivo;
            if (($linha > 0) and ( !empty($row ['imagem'])) and (file_exists($excluir))) {
                unlink($excluir);
                 $_SESSION ["msnexcluiuimagem"] = '<div class="alert   alert-success alert-dismissible fade show" role="alert">
   Excluiu a imagem anterior
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
            }else{
                   $_SESSION ["msnexcluiuimagem"] = '<div class="alert   alert-success alert-dismissible fade show" role="alert">
   Não excluiu a imagem
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
                
            }
            move_uploaded_file($temporario_arquivo, $diretorio . $novo_nome);
            $conexao = conectar();
            $atualizado = date('d/m/Y H:i:s');
            $sql1 = "update usuarios set imagem = '$novo_nome' where usuario = '$usuario'";
            $salvar = mysqli_query($conexao, $sql1);
            $linhas = mysqli_affected_rows($conexao);
            if ($linhas > 0) {
               
                $conexao = conectar();
         
            $sql1 = "select imagem from usuarios where idusuario = '$idusuario'";
            $salvar12 = mysqli_query($conexao, $sql1);
             $row = mysqli_fetch_assoc($salvar12);
               $_SESSION['imagem'] = $row ['imagem'];
                $imagem = $_SESSION['imagem'];
                
                
                
                
                  $_SESSION ["msnmudouimagem"] = '<div class="alert   alert-success alert-dismissible fade show" role="alert">
   Mudou a imagem
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
        header("Location: http://localhost/site_1/admin.php");
          exit();
            } else {
                   $_SESSION ["msnnaocadastrou"] =  '<div class="alert   alert-success alert-dismissible fade show" role="alert">
   Não cadastrou a imagem
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';   
        header("Location: http://localhost/site_1/admin.php");
        exit();
            }
        }
    } else {
            $_SESSION ["msnotiponaoepermitido"] =  '<div class="alert   alert-success alert-dismissible fade show" role="alert">
  Tipo de arquivo nao permitido
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';  
        header("Location: http://localhost/site_1/admin.php");
          exit();
    }
}  





      
        

  
       
     
