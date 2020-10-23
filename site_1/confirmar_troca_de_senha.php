 <?php
 include_once('conexao.php');
 $conexao = conectar();
 $senhakey = $_GET['senhakey'];
 $sql = "select idusuario,usuario ,trocadesenha from usuarios where trocadesenha = '$senhakey'";
$result = mysqli_query($conexao,$sql) or die(mysqli_error());
$linhas = mysqli_affected_rows($conexao);
if ($linhas > 0) {
    session_start();
    $row = mysqli_fetch_assoc($result);
    
    $_SESSION['usuario'] = $row ['usuario'];
     $_SESSION['idusuario'] = $row ['idusuario'];
    $_SESSION['trocadesenha'] = $row ['trocadesenha'];
       header("Location:novasenha.php");
        exit;
    
}else
{
echo "Ocorreu um erro.";
}
