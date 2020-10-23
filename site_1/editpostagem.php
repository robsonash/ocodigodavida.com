<?php
session_start();
include_once("conexao.php");
$conexao = conectar();
 $nomedoarquivoantigo = isset($_POST['imagempost']) ? $_POST['imagempost'] : "";
$idusuariosessao = $_SESSION['idusuario'];
$arquivo = isset($_FILES['arquivo']) ? $_FILES['arquivo'] : "";
$idpostagem = isset($_POST['idpostagem']) ? $_POST['idpostagem'] : "";
if (isset($_FILES['arquivo'])) {
    $nome = $_FILES['arquivo']['name'];
    $diretorio = "uploadpostagem/";
    $tamanho_maximo = 4000000;
    $temporario_arquivo = $_FILES['arquivo']['tmp_name'];
    $tamanho_arquivo = $_FILES['arquivo']['size'];
    $permitidos = ['jpg', 'jpeg', 'png'];
    $extensao = explode('.', $nome);
    $nome_ = reset($extensao);
    $extensao = end($extensao);
    global $novo_nome;
    $novo_nome = md5(time()) . "-$nome_" . '.' . $extensao;
  

    if (in_array($extensao, $permitidos)) {


        if ($tamanho_arquivo > $tamanho_maximo) {
           $_SESSION['mspost'] = '<div class="alert   alert-danger alert-dismissible fade show" role="alert">
  O tamanho do arquivo exede o limite permitido
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
                header("Location:post.php");
                exit();
        }else{
            $conexao = conectar();
            $nomepost = isset($_POST['nomepost']) ? $_POST['nomepost'] : "";
            $descricaopost = isset($_POST['descricaopost']) ? $_POST['descricaopost'] : "";
            $textopost = isset($_POST['textopost' . $idpostagem]) ? $_POST['textopost'] : "";
            //$imagempost = isset($_POST['imagempost']) ? $_POST['imagempost'] : "";
            $statuspost = isset($_POST['statuspost']) ? $_POST['statuspost'] : "";
            $idusuariosessao = isset($_POST['idusuariosessao']) ? $_POST['idusuariosessao'] : "";
            $data = date('d-m-Y H:i:s');
            $data = (str_replace("-", "", $data));
            $data = (str_replace(":", "", $data));

            $conexao = conectar();

            $sql2 = "update postagem set nomepost = '$nomepost' ,descricaopost = '$descricaopost',textopost =  '$textopost',statuspost = '$statuspost',datapost = now() ,imagempost = '$novo_nome',idusuario = '$idusuariosessao' where idpostagem = $idpostagem ";
            $salvar = mysqli_query($conexao, $sql2);
            $linhas = mysqli_affected_rows($conexao);

            if ($linhas > 0) {
                 $excluir = "uploadpostagem/" . $nomedoarquivoantigo;
      
                unlink($excluir);
              
            move_uploaded_file($temporario_arquivo, $diretorio . $novo_nome);
                
                $_SESSION['msgpostedit'] = '<div class="alert   alert-success alert-dismissible fade show" role="alert">
   Editado com sucesso
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
                header("Location:post.php");
                exit();      
            }else {
                $_SESSION['msgpostedit'] = '<div class="alert   alert-danger alert-dismissible fade show" role="alert">
   Não editou '.$idpostagem .'
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
                header("Location:post.php");
                exit();
            }
        }
    } else {
                $_SESSION['msgpostedit'] = '<div class="alert   alert-danger alert-dismissible fade show" role="alert">
  Tipo do arquivo nao permitido
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
                header("Location:post.php");
                exit();
    }
}else{
    
    $_SESSION['msgpostedit'] = '<div class="alert   alert-danger alert-dismissible fade show" role="alert">
  nao tem arquivo
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
                header("Location:post.php");
                exit();
}