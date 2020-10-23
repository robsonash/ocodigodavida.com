<?php
function cadastro() {
    $nome = isset($_POST['nome']) ? $_POST['nome'] : "";
    $usuario = isset($_POST['usuario']) ? $_POST['usuario'] : "";
    $usuario = strtolower($usuario);
    $senha = isset($_POST['senha']) ? $_POST['senha'] : "";
    $minusculo = 0;
    $maiusculo = 0;
    $numero = 0;
    $pontos = 0;
    $espaço = 0;
    $comcode = md5(uniqid(rand()));
    if (preg_match("/[0-9]/", $senha)) {
        $numero = 1;
        $_SESSION['msg1'] = '<div class="alert   alert-success alert-dismissible fade show" role="alert">
   Com numero
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
    } else {
        $_SESSION['msg1'] = '<div class="alert   alert-danger alert-dismissible fade show" role="alert">
   Sem numero
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
        $numero = 0;
    }
    if (preg_match("/[a-z]/", $senha)) {
        $_SESSION['msg2'] = '<div class="alert   alert-success alert-dismissible fade show" role="alert">
   Com minusculo
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
        $minusculo = 1;
    } else {
        $_SESSION['msg2'] = '<div class="alert   alert-danger alert-dismissible fade show" role="alert">
   A senha presisa ter no minimo uma letra minuscula
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
        $minusculo = 0;
    }
    if (preg_match("/[A-Z]/", $senha)) {
        $_SESSION['msg3'] = '<div class="alert   alert-success alert-dismissible fade show" role="alert">
   Com maiusculo
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
        $maiusculo = 1;
    } else {
        $_SESSION['msg3'] = '<div class="alert   alert-danger alert-dismissible fade show" role="alert">
  A senha presisa ter no minimo uma letra maiuscula
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
        $maiusculo = 0;
    }
    if (preg_match("/[\.\-\_]/", $senha)) {
        $_SESSION['msg4'] = '<div class="alert   alert-success alert-dismissible fade show" role="alert">
   Com caracter especial
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
        $pontos = 1;
    } else {
        $_SESSION['msg4'] = '<div class="alert   alert-danger alert-dismissible fade show" role="alert">
    A senha presisa ter no minimo um caracter especial 
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
        $pontos = 0;
    }
    $senha = preg_replace('/\s+/', '', $senha);
    $conexao = conectar();
    $sql1 = "SELECT idusuario,usuario FROM ocodig64_codgniter.usuarios where usuario = '$usuario'";
    $salva = mysqli_query($conexao, $sql1);
    $linha = mysqli_affected_rows($conexao);
    if ($linha > 0) {
   
         $_SESSION['msg12'] = '<div class="alert   alert-danger alert-dismissible fade show" role="alert">
  Voçe ja esta cadastrado 
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
        header('Location:cadastrausuario.php'); 
        fecharconexao($conexao);
        exit();
        
        
    }else{
        if (($numero === 1) && ($minusculo === 1) && ($maiusculo === 1) && ($pontos === 1)) {
            //$senha = md5($senha);
            $conexao = conectar();
            $sql1 = "insert into ocodig64_codgniter.usuarios (nome,usuario,senha,comcode,status,data) values ('$nome','$usuario','$senha', '$comcode','2', now())";
            $salvar = mysqli_query($conexao, $sql1);
            $linhas = mysqli_affected_rows($conexao);
            if ($linhas > 0) {
                $to = $usuario;
                $subject = "Confirmação o codigo da vida  para $usuario";
                $headers = "MIME-Version: 1.1\n";
                $headers .= "Content-type: text/html; charset=utf-8\n";
                $headers .= "From: robson@ocodigodavida.com\r\n";
                $message = "Por favor clique no link abaixo para confirmar a sua conta. \n ";
                $message .= "<a href=\"http://localhost/site_1/confirmar_email.php?passkey=$comcode \">Clique a para ativar sua conta </a>";
                $sentmail = mail($to, $subject, $message, $headers);
                if ($sentmail) {
                    echo 
                    $_SESSION['msgenviado'] = '<div class="alert   alert-success alert-dismissible fade show" role="alert">
  Foi enviado um e-mail de confirmação para o seu endereço de e-mail. Clique para voltar à página de login.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
            header("Location:cadastrausuario.php");
            exit();
            
                } else {
                    echo "
            <script language='JavaScript'>
            window.alert('Não foi possível enviar um e-mail de confirmação para o seu endereço de e-mail. Clique para voltar à página de cadastro.')
            window.location.href='cadastrausuario.php';
            </script>";
                }
            }
        } else {
                $_SESSION['msgnao'] = '<div class="alert   alert-danger alert-dismissible fade show" role="alert">
  Voçe ja esta cadastrado 
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
            header("Location:cadastrausuario.php");
            exit();
        }
    }
}
