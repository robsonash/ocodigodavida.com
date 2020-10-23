 <?php
 // Resultado da confirmação de e-mail que é recebido pelo utilizador.
 include('conexao.php');
 $conexao = conectar();
 $passkey = $_GET['passkey'];
$sql = "update usuarios set ativo='1' where comcode='$passkey'";
$result = mysqli_query($conexao,$sql) or die(mysqli_error());

if($result)
{
echo '<div>A sua conta está ativa. Já pode <a href="Login.php">entrar.
</a></div>';
}
else
{
echo "Ocorreu um erro.";
}
?>