<?php
session_start();
$idusuario = $_SESSION['idusuario'];
include_once("conexao.php");
$conexao = conectar();
$arquivo = isset($_FILES['arquivo']) ? $_FILES['arquivo'] : "";
if (isset($_FILES['arquivo'])) {
    $nome = $_FILES['arquivo']['name'];
    $diretorio = "upload-de-arquivos/";
    $tamanho_maximo = 1073741824;
    $temporario_arquivo = $_FILES['arquivo']['tmp_name'];
    $tamanho_arquivo = $_FILES['arquivo']['size'];
    $permitidos = ['exe', 'rar'];
    $extensao = explode('.', $nome);
    $nome_ = reset($extensao);
    $extensao = end($extensao);
    $novo_nome = md5(time()) . "-$nome_" . '.' . $extensao;
    $usuario = $_SESSION['usuario'];
     $idpostagem = $_SESSION['idpostagem'] ;
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
            move_uploaded_file($temporario_arquivo, $diretorio . $novo_nome);
            $conexao = conectar();
            $atualizado = date('d/m/Y H:i:s');
            $sql1 = "update usuarios set imagem = '$novo_nome' where usuario = '$usuario'";
            $salvar = mysqli_query($conexao, $sql1);
            $linhas = mysqli_affected_rows($conexao);
            if ($linhas > 0) {
             
  
        header("Location: http://localhost/site_1/admin.php");
          exit();
            } else {
                   $_SESSION ["msnnaocadastrou"] =  '<div class="alert   alert-success alert-dismissible fade show" role="alert">
   Não cadastrou o arquivo
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





      
        

  
       
     