<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>O Código da Vida</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/css?family=Mali&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="../footer/footer.css">
        <script src="jquery-3.4.1.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
        <style>
            body{
                padding: 10px;
position: relative;
            }
            .imgbolinha{
                cursor: pointer;
                border-radius: 50px;
                width: 50px;
                height: 50px;}
            .navbar-brand{
                float: left ;
                height: 60px;
            }
            .navbar-brand  p{
                color: #ff6666; float: left;
            }
            .navbar-brand  a{
                color: #cccc00;
            }
            .layout{
                padding:80px 0;
                background-repeat: no-repeat;
                height: 92.6vh;
            }

            .ilustra{
                text-align: center;
                font-size: 100px;
                color: rgb(244,71,107);
            }
            .input-group-text{
                color:#ffffff;
                background:#74c7ac;
            }
            .linkss a:hover{
                text-decoration: none !important;
                list-style: none !important;
                color:#3333ff;
            }
            form{
                width: 100%;
            }
            @font-face{
                font-family: "arial-rounded-mt-light";
                src: url('fonts/arial-rounded-mt-light.ttf');
            }
            h1{ font-family: 'Mali', cursive;

            }
            h2{ font-family: 'Mali', cursive;
            }
            p{
                font-family: 'Mali', cursive;
            }
            .menuc{background-color:#000000; color:#ffffff;}
                
                   .rowsem{ margin-right: 0;
                     margin-left: 0;
                     }
                     .area {
                     border-radius: 4px;
                     box-shadow: 1px 0px 4px 0px #33ff33;
                     background: #ffffff;
                     border: 2px solid #009966;
                     width: 100%;        
                     }
                    
                     .efeito:hover{
                     cursor:pointer;
                     color:  #00ccff;
                     box-shadow: 1px 1px 10px;
                     }
                     @media  screen and (max-width: 360px){

                     .layout{
                     padding: 20px 0; 
                     height: 91.3vh;
                     background-image: none;
                     background-color: #000;
                     }

                     form{
                     height: 100%;
                     padding: 10px;

                     }
                     }

            </style>

        </head>
        <body>
          
            <?php include_once("menu.php"); ?>






            





            <div class="row d-flex flex-wrap mt-2" style="margin-bottom:100px;">

                <div class="col-sm-8">
                    <?php
                    foreach ($articles as $row) {
                        $idpostagem = $row['idpostagem'];
                        //$idcomentario = $row['idcomentario'];
                    }
                    ?> 
                    <div class="card" style="width:100%"   >

                        <div class="imgpostesquerda">
                            <?php print "<img style='height:100%; width: 100%;' src='uploadpostagem/" . $row['imagempost'] . "'></img>";
                            ?>
                        </div>
                        <h2 style=" background-color:#f8f9fa;font-size: 28.0pt; margin-top:10px;    font-family: 'Arial Rounded MT Bold',sans-serif;;"><?php foreach ($articles as $row) {
                                ?>    <?php echo $row['nomepost']; ?> <?php } ?></h2>
                        <p>Postado por  <?php foreach ($articles as $row) { ?>    <?php
                                echo $row['nome'] . "\n" . "&nbsp - &nbsp";
                                echo date('d/m/Y h:i:s', strtotime($row['datapost']));
                                ?> <?php } ?></p>
                        <h5><?php foreach ($articles as $row) { ?>    <?php echo $row['descricaopost']; ?> <?php } ?></h5>
                        <p><?php foreach ($articles as $row) { ?>    <?php echo $row['textopost']; ?> <?php } ?></p>


                    </div>





                    <div class="rowsem d-flex " >
                        <form  method="post" action="comentarioadd.php" >
                            <?PHP
                            if (((!isset($_SESSION['usuario']) == true) and ( !isset($_SESSION['senha']) == true))) {
                                print "<p> Presisa estar <a href='Login.php'>logado</a> para comentar</p>";
                                  if (isset($_SESSION['msg'])) {
                                        echo $_SESSION['msg'];
                                        unset($_SESSION['msg']);
                                    }
                            }
                            ?>

                            <textarea name="textocomentario"class="area"></textarea>
                            <input type="hidden" value="<?php print $p ?>" name="p"> 
                            <input  type="hidden" name="status" id="status"   value="<?php print "$status"; ?>">
                            <input  type="hidden" name="nome" id="nome"   value="<?php print "$idnome"; ?>">
                            <input  type="hidden" name="idusuario" id="idusuario"   value="<?php print "$idusuario"; ?>">
                            <input  type="hidden" name="idpostagem" id="idpostagem"   value="<?php print "$idpostagem"; ?>">
                            <button type="submit" name="comentar" class="btn btn-success btn-block">Comentar</button>                      
                        </form>
                    </div>




                    <?php
                    foreach ($c as $row):
                        $usuariocomentario = $row['idusuario'];
                        $imagem = $row['imagem'];
                        $nome = $row['nome'];
                        $data = $row['datacomentario'];
                        $texto = $row['textocomentario'];
                        $dataf = date('d/m/Y', strtotime($data));
                        $idcomentario = $row['idcomentario'];
                        ?> 
                        <div class="d-flex shadow-sm  bg-white" style="border-radius: 10px;margin-top:10px;">
                            <div class="col"style="width:60px; height:81px;     padding: 0;" >

                                <?php if (empty($imagem)) { ?> 
                                    <img class="img rounded-circle"   width="35" height="35" src='upload/nada.jpg'>
                                <?php } else { ?> 
                                    <img class="img rounded-circle"   width="35" height="35" src='upload/<?php print $imagem; ?> '>
                                <?php } ?> 
                            </div>
                            <div class='col-sm-10' style='margin-left: 5px;'>
                                <div class='row' style='height:20px;'> 
                                    <p> <span style="font-weight: bold;color:#66ccff; font-size: 16px;"><?php print $nome; ?> </span>   &nbsp - &nbsp 
                                        <span style="font-size: small;color: #6D6D6D;"><?php print $dataf; ?> </span>
                                    </p>
                                </div>
                                <div class='row'>
                                    <p> <?php print $texto ?>  </p> 
                                </div>
                                <div class="row" style="height:20px;">
                                    <p style=" font-size: 11px;color: #999999; height:20px;">&#8630; &nbsp Responder &nbsp <img class='img' width="11" height="11" src="imagens/cinza cima.png" 
                                                                                                                                onmouseover="this.src = 'imagens/azul cima.png'"
                                                                                                                                onmouseout="this.src = 'imagens/cinza cima.png'">
                                        &nbsp  
                                        <img class='img 'width="11" height="11" src="imagens/cinza baixo.png"
                                             onmouseover="this.src = 'imagens/azul baixo.png'"
                                             onmouseout="this.src = 'imagens/cinza baixo.png'">&nbspRespostas()</p>
                                </div>
                            </div>




                            <div class="d-flex col justify-content-end">
                                <div class="row">
                                    <?php
                                    if (isset($idusuario)) {
                                        if ($idusuario == $usuariocomentario) {
                                            ?> 
                                            <form style="padding:1px;" action="remover.php" method="post">
                                                <input type="hidden" value="<?php print $p ?>" name="p"> 
                                                <input type="hidden" name="idcomentario" id="idcomentario"  value="<?php print $idcomentario; ?>">
                                                <button class="btn-sm rounded-circle "  style="margin-right:4px;background-color:#0b2eda3d;border: none; margin-right: 4px;" type="submit"><i class="far fa-trash-alt" style="color:red;"></i></button>
                                            </form>
                                            <?php
                                        }
                                    }
                                    ?> 
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?> 
                </div> 





















                <div class="col-sm-4" style="width: 100%; ">
                    <?php foreach ($a as $row) { ?> 
                        <a href='http://localhost/site_1/?p=<?php print $row["idpostagem"] ?>'>
                            <div class="card p-4 efeito " style="width:100%;margin-bottom: 5px;">
                                <h2 class="font-weight-bold mb-3 text-primary">   <?php echo $row['nomepost']; ?></h2>





                                <img class='card-img-top mt-2'  src='uploadpostagem/<?php print $row['imagempost'] ?> '>


                                <div class="card-body">
                                    <p class="card-text"><?php echo $row['descricaopost']; ?> </p>
                                </div>
                            </div></a>
                    <?php } ?> 
                </div>








            </div>
            

 <?php include_once("./footer/footer.php"); ?>
        </body>

       

        <script src= "jquery-3.4.1.min.js" ></script>
        <script>
                                                     $(document).ready(function() {

                                             $(".cross").hide();
                                                     $(".ulmobile").hide();
                                                     $(".hamburger").click(function() {
                                             $(".ulmobile").slideToggle("slow", function() {
                                             $(".hamburger").hide();
                                                     $(".cross").show();
                                             });
                                             });
                                                     $(".cross").click(function() {
                                             $(".ulmobile").slideToggle("slow", function() {
                                             $(".cross").hide();
                                                     $(".hamburger").show();
                                             });
                                             });
                                             });</script>
        <script>
                    function inicialmodal (modalID){
                    const modal = document.getElementById(modalID);
                            if (modal){
                    modal.classList.add('mostrar');
                            modal.addEventListener('click', (e) = > {
                            if (e.target.id == modalID || e.target.className == 'fechar'){
                            modal.classList.remove ('mostrar');
                            }
                            });
                    }}
            const trocar = document.querySelector('.trocar');
                    trocar.addEventListener('click', () = > inicialmodal('modal_imagem'));</script>
        <script src= "seleimagem.js" ></script>                                                       
        <script src= "seleimagem.js" ></script>
    </html>
