<?php
session_start();
if ((!isset($_SESSION['usuario']) == true) and (!isset($_SESSION['senha']) == true)) {
    unset($_SESSION['usuario']);
    unset($_SESSION['senha']);
    header('location:index.php');
}
include_once("conexao.php");
$conexao = conectar();
$articles = f();
$idusuario = $_SESSION['idusuario'];
$arquivo = isset($_FILES['arquivo']) ? $_FILES['arquivo'] : "";
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
    $idpostagem = $_SESSION['idpostagem'];

    if (in_array($extensao, $permitidos)) {


        if ($tamanho_arquivo > $tamanho_maximo) {
           $_SESSION['msgadmin'] = '<div class="alert   alert-danger alert-dismissible fade show" role="alert">
  O tamanho do arquivo exede o limite permitido
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
                header("Location:admin.php");
                exit();
        } else {
            move_uploaded_file($temporario_arquivo, $diretorio . $novo_nome);
  

            $conexao = conectar();


            $nomepost = isset($_POST['nomepost']) ? $_POST['nomepost'] : "";
            $descricaopost = isset($_POST['descricaopost']) ? $_POST['descricaopost'] : "";
            $textopost = isset($_POST['textopost']) ? $_POST['textopost'] : "";
            //$imagempost = isset($_POST['imagempost']) ? $_POST['imagempost'] : "";
            $statuspost = isset($_POST['statuspost']) ? $_POST['statuspost'] : "";
            $idusuario = isset($_POST['idusuario']) ? $_POST['idusuario'] : "";
            $data = date('d-m-Y H:i:s');
            $data = (str_replace("-", "", $data));
            $data = (str_replace(":", "", $data));

            $conexao = conectar();

            $sql2 = "insert into postagem (nomepost,descricaopost,textopost,statuspost,datapost,imagempost,idusuario) values ('$nomepost','$descricaopost','$textopost','$statuspost',now(),'$novo_nome','$idusuario')";
            $salvar = mysqli_query($conexao, $sql2);
            $linhas = mysqli_affected_rows($conexao);

            if ($linhas > 0) {
                
                
                
                
                $_SESSION['msgadmin'] = '<div class="alert   alert-success alert-dismissible fade show" role="alert">
   Cadastrado com sucesso
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
                header("Location:admin.php");
                exit();
                
                
                
            } else {
                
                
                
                $_SESSION['msgadmin'] = '<div class="alert   alert-danger alert-dismissible fade show" role="alert">
   Não cadastrou
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
                header("Location:admin.php");
                exit();
            }
        }
    } else {
        
        
                $_SESSION['msgadmin'] = '<div class="alert   alert-danger alert-dismissible fade show" role="alert">
  Tipo do arquivo nao permitido
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
                header("Location:admin.php");
                exit();
    }
}



