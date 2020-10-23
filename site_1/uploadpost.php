<?php
include_once("conexao.php");
$conexao = conectar();
$arquivo = isset($_FILES['arquivo']) ? $_FILES['arquivo'] : "";
if (isset($_FILES['arquivo'])) {
    $nome = $_FILES['arquivo']['name'];
    $diretorio = "uploadpostagem/";
    $tamanho_maximo = 4000000;   
    $temporario_arquivo = $_FILES['arquivo']['tmp_name'];
    $tamanho_arquivo = $_FILES['arquivo']['size'];
    $permitidos = ['jpg','jpeg','png'];
    $extensao = explode('.', $nome);
    $nome_ = reset($extensao);
    $extensao = end($extensao);
    global $novo_nome;
    $novo_nome = md5(time()) . "-$nome_" . '.' . $extensao;
    $idpostagem = $_SESSION['idpostagem'] ;

    if (in_array($extensao, $permitidos)) {
     
    
    if ($tamanho_arquivo > $tamanho_maximo) {
        print"o tamanho do arquivo exede o limite permitido";
                
    }else{
       
          move_uploaded_file($temporario_arquivo, $diretorio . $novo_nome);
 
        print"ok";
        echo "Upload feito com sucesso !";
        print $_SESSION['usuario'];
       
          $conexao = conectar();
        $sql1 = "insert into postagem ('imagempost') values ('$novo_nome')"; 
      
         mysqli_query($conexao, $sql1);
        $linhas = mysqli_affected_rows($conexao);
        if ($linhas > 0) {
            print"ja cadastrou ";
        
        }else {
        print"nao cadastrou";
    }
    
        
        
    } }else{ 
            print"o tipo nao é  permitidu"; }
              

}

        




