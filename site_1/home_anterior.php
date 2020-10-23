<?php
session_start();
include_once("conexao.php");
$conexao = conectar();
$url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
include_once("verificação.php");



if ($p = isset($_GET['p'])) {

    $p = $_GET['p'];
    $sql = "SELECT postagem.*,usuarios.* FROM postagem
INNER JOIN usuarios ON postagem.idusuario = usuarios.idusuario WHERE idpostagem = $p ";
    $consulta = mysqli_query($conexao, $sql);
    global $filtro;
    $articles = array();
    while ($row = mysqli_fetch_assoc($consulta)) {
        $articles[] = $row;
        $linhas = mysqli_affected_rows($conexao);
    }
    $idpostagem = $p;
} else {
    $sql = "SELECT postagem.*,usuarios.* FROM postagem
INNER JOIN usuarios ON postagem.idusuario = usuarios.idusuario WHERE idpostagem = '1' ";
    $consulta = mysqli_query($conexao, $sql);
    global $filtro;
    $articles = array();
    while ($row = mysqli_fetch_assoc($consulta)) {
        $articles[] = $row;
        $linhas = mysqli_affected_rows($conexao);
    }

    $idpostagem = $row['idpostagem'];
}





$sql1 = "SELECT * FROM postagem order by idpostagem desc limit 5";
$consulta = mysqli_query($conexao, $sql1);
$a = array();
while ($row = mysqli_fetch_assoc($consulta)) {
    $a[] = $row;
    $linhas = mysqli_affected_rows($conexao);
}






if ($p = isset($_GET['p'])) {
    $p = $_GET['p'];
    $sql2 = "SELECT postagem.idpostagem,postagem.nomepost,comentario.*,usuarios.imagem,usuarios.idusuario, usuarios.nome FROM comentario
INNER JOIN usuarios ON comentario.idusuario = usuarios.idusuario
INNER JOIN postagem ON postagem.idpostagem = comentario.idpostagem  where postagem.idpostagem = $p order by idcomentario";
    $consulta = mysqli_query($conexao, $sql2);
    $c = array();
    while ($row = mysqli_fetch_assoc($consulta)) {
        $c[] = $row;
        $linhas = mysqli_affected_rows($conexao);
    }
    //  gillbero.lm@gmail.com
    // Aa.03
} else {
    $sql = "SELECT postagem.idpostagem,postagem.nomepost,comentario.*,usuarios.imagem,usuarios.idusuario, usuarios.nome FROM comentario
INNER JOIN usuarios ON comentario.idusuario = usuarios.idusuario
INNER JOIN postagem ON postagem.idpostagem = comentario.idpostagem  where postagem.idpostagem = '1' order by idcomentario";
    $consulta = mysqli_query($conexao, $sql);
    global $filtro;
    $c = array();
    while ($row = mysqli_fetch_assoc($consulta)) {
        $c[] = $row;
        $linhas = mysqli_affected_rows($conexao);
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>O Código da Vida</title>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/css?family=Mali&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="menu.css">
          <link rel="stylesheet" href="menu/menumobile.css">
        <link rel="stylesheet" href="home.css">
        <link rel="stylesheet" href="homemobile/homemobile.css">
        <link rel="stylesheet" href="footer/footer.css">

        <script src="jquery-3.4.1.min.js"></script>

    </head>
    <body>
        <div class="containerprincipal">


        <div class="menu">
            <div class="menucol1"> 
                <?php
                if ((!isset($_SESSION['usuario']) == true) and ( !isset($_SESSION['senha']) == true)) {
                    unset($_SESSION['usuario']);
                    unset($_SESSION['senha']);
                    unset($_SESSION['status']);
                    unset($_SESSION['imagem']);
                }
                if ((isset($_SESSION['usuario']) == true) and ( isset($_SESSION['senha']) == true)) {

                    $idusuario = ($_SESSION['idusuario']);
                    $usuario = ($_SESSION['usuario']);
                    $status = ($_SESSION['status']);
                    $imagem = ($_SESSION['imagem']);
                    if ($_SESSION['status'] == 1) {
                        print"<div class='linhausuario'><p class='linhaimg'>  <img class='imgbolinha trocar' src='upload/" . ((empty($imagem)) ? 'nada.jpg' : $imagem ) . "'  > </p>"
                                . "<p class='linhausuarioinfo'>$usuario <br><a href='admin.php'>Admin</a><a href='logout.php'>Sair<br></a></p> </div>";
                    } else {
                        print"<div class='linhausuario'><p class='linhaimg'>  <img class='imgbolinha trocar' src='upload/" . ((empty($imagem)) ? 'nada.jpg' : $imagem ) . "'  > </p>"
                                . "<p class='linhausuarioinfo'>$usuario <br><a href='logout.php'>Sair<br></a></p> </div>";
                    }
                }
                ?>
            </div>
            <div class="menucol2">
                  <button class="hamburger">&#9776;</button>
                    <button class="cross">&#735;</button>
                <ul class="menulinks" >
                    <li><a  class="ativo"href="http://localhost/site_1/">home</a></li>
                    <li><a  href="http://localhost/site_1/login">Login</a></li>
                    <li><a href="http://localhost/site_1/contato">Contato</a></li>
                </ul>
            <ul class="ulmobile" >
                    <li><a  class="ativo"href="http://localhost/site_1/">home</a></li>
                    <li><a  href="http://localhost/site_1/login">Login</a></li>
                    <li><a href="http://localhost/site_1/contato">Contato</a></li>
                </ul></div>
        </div>















        <div class="header">
            <h2> O CÓDIGO DA VIDA</h2>
            <div  class="text">
                <p >Estamos aqui nesse mundo por algum proposito , seja para mudar para melhor </p>
                <p> ou destruir o que nos foi dado. Voce tem apenas que uma escolha tomar !</p>
                <p>Sua vida é uma falha porcaria onde vc tem que estudar que nem um louko
                    para poder </p>
                <p>comprar um ps4 e viver brigando para sempre no trabalho</p></p>
            </div>
        </div>

        <div class="row">
      
            <div class="leftcolumn">
                 <?php
                 foreach ($articles as $row){
                     $idpostagem = $row['idpostagem']; 
                      //$idcomentario = $row['idcomentario'];
                 }
               
                   
                    ?> 
                <div class="card">
                    <h2><?php foreach ($articles as $row) {
                        ?>    <?php echo $row['nomepost']; ?> <?php } ?></h2>
                    <p>Postado por  <?php foreach ($articles as $row) { ?>    <?php
                            echo $row['nome'] . "\n" . "&nbsp - &nbsp";
                            echo date('d/m/Y h:i:s', strtotime($row['datapost']));
                            ?> <?php } ?></p>
                    <h5><?php foreach ($articles as $row) { ?>    <?php echo $row['descricaopost']; ?> <?php } ?></h5>
                    <div class="imgpostesquerda">
                        <?php print "<img style='height:100%; width: 100%;' src='uploadpostagem/" . $row['imagempost'] . "'></img>";
                        ?>
                    </div>
                    <p><?php foreach ($articles as $row) { ?>    <?php echo $row['textopost']; ?> <?php } ?></p>
                   
                      
                </div>





                <div class="cardadd">
                    <form  method="post" action="comentarioadd.php" >
                        <?PHP
                        if (((!isset($_SESSION['usuario']) == true) and ( !isset($_SESSION['senha']) == true))) {
                            print "<p> Presisa estar <a href='Login.php'>logado</a> para comentar</p>";
                        }
                        ?>

                        <textarea name="textocomentario"class="area"></textarea>
                        <input type="hidden" value="<?php print "$p" ?>" name="p"> 
                        <input  type="hidden" name="idusuario" id="idusuario"   value="<?php print "$idusuario"; ?>">
                        <input  type="hidden" name="idpostagem" id="idpostagem"   value="<?php print "$idpostagem"; ?>">
                        <input value="Comentar"name="Comentar" type="submit"> 
                    </form>
                </div>




                <?php
                foreach ($c as $row):
                    $usuario = $row['idusuario'];
                    $imagem = $row['imagem'];
                    $nome = $row['nome'];
                    $data = $row['datacomentario'];
                    $texto = $row['textocomentario'];
                    $dataf = date('d/m/Y', strtotime($data));
                    $idcomentario = $row['idcomentario'];
                    ?> 
                    <div class="cardcomentario">
                        <div class="linha">

                            <div class='coluna'>
                                <?php if (empty($imagem)) { ?> 
                                    <p><img src='upload/nada.jpg'></p>
                                <?php } else { ?> 
                                    <p><img src='upload/<?php print $imagem; ?> '></p>
                                <?php } ?> 
                            </div>
                            <div class='coluna2'>
                                <div class='linha1c'> <p> <span class='span1'>  <?php print $nome; ?>  </span>  &nbsp - &nbsp 
                                        <span class='span2'>  <?php print $dataf; ?>   </span></p>
                                </div>
                                <div class='linha2c'>
                                    <h5> <?php print $texto ?>  </h5> 
                                </div>



                                <div class="linha3c">
                                    <p>&#8630; &nbsp Responder &nbsp &nbsp<img src="imagens/cinza cima.png" 
                                                                               onmouseover="this.src = 'imagens/azul cima.png'"
                                                                               onmouseout="this.src = 'imagens/cinza cima.png'">
                                        &nbsp &nbsp &nbsp &nbsp
                                        <img src="imagens/cinza baixo.png"
                                             onmouseover="this.src = 'imagens/azul baixo.png'"
                                             onmouseout="this.src = 'imagens/cinza baixo.png'">&nbsp &nbsp   Respostas()</p>




                                </div>


                            </div>
                            <?php
                            if (isset($idusuario) == $usuario) {
                                ?> 
                                <div class='coluna3'>
                                    <div class='linha1c3'>
                                        <form action="remover.php" method="post">
                                            <input type="hidden" value="<?php print "$p" ?>" name="p"> 
                                            <input type="hidden" name="idcomentario" id="idcomentario"  value="<?php print $idcomentario; ?>">
                                            <input src='imagens/remover.png' type="image">
                                         
                                        </form>
                                    </div>
                                    </div><?php } ?> 





                            </div>
                        </div>
                    <?php endforeach; ?> 
                </div>





















                <div class="rightcolumn">
                    <?php foreach ($a as $row) { ?> 
                        <div class="carddireita">
                            <h2>   <?php echo $row['nomepost']; ?></h2>
                            <div class="imgpostdireita" >
                                <?php print "<a href='http://localhost/site_1/?p=" . $row["idpostagem"] . "'><img class='imgpost'  src='uploadpostagem/" . $row['imagempost'] . "'></img></a>";
                                ?>

                            </div>
                            <p><?php echo $row['descricaopost']; ?> </p>
                        </div>

                    <?php } ?> 
                </div>




                <a>
                    <img>

                    </img>
                </a>



            </div>
<div id="modal_imagem" class="modal_container ">
            <div class="modal">
                <h1> upload </h1>
                <button class="fechar">
                    x
                </button>
                <form method="post"  action="upload.php" enctype="multipart/form-data">
                    arquivo: <input type="file" required name="arquivo"> 
                    <input class="btn" type="submit" >
                </form>
            </div>
        </div>
           

    </body>
    
    <?php include_once("./footer/footer.php"); ?>
    <script src= "jquery-3.4.1.min.js" ></script>
          <script>
$( document ).ready(function() {

$( ".cross" ).hide();
$( ".ulmobile" ).hide();
$( ".hamburger" ).click(function() {
$( ".ulmobile" ).slideToggle( "slow", function() {
$( ".hamburger" ).hide();
$( ".cross" ).show();
});
});

$( ".cross" ).click(function() {
$( ".ulmobile" ).slideToggle( "slow", function() {
$( ".cross" ).hide();
$( ".hamburger" ).show();
});
});
});
</script>
  <script>
                            function inicialmodal (modalID){
                            const modal = document.getElementById(modalID);
                                    if (modal){
                            modal.classList.add('mostrar');
                                    modal.addEventListener('click', (e) => {
                                    if (e.target.id == modalID || e.target.className == 'fechar'){
                                    modal.classList.remove ('mostrar');
                                    }
                                    });
                            }}
                    const trocar = document.querySelector('.trocar');
                            trocar.addEventListener('click', () => inicialmodal('modal_imagem'));
                                                    </script>
<script src= "seleimagem.js" ></script>                                                       
    <script src= "seleimagem.js" ></script>
</html>
