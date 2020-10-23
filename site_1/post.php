<?php
session_start();
if ((!isset($_SESSION['usuario']) == true) and (!isset($_SESSION['senha']) == true)) {
    unset($_SESSION['usuario']);
    unset($_SESSION['senha']);
    unset($_SESSION['status']);
    header('location:index.php');
}
$status = $_SESSION['status'];
if (($status == '2')) {
    header('location:home.php');
}
include_once("conexao.php");
include_once("uploadpost.php");
$art = postagem();
$conexao = conectar();
$idusuariosessao = $_SESSION['idusuario'];
$imagem = $_SESSION['imagem'];
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>O Código da Vida</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/css?family=Mali&display=swap" rel="stylesheet">
        <script src="jquery-3.4.1.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="ckeditor/ckeditor.js"></script>  
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
        <style>
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
        </style>

    </head>
    <body>

        <?php include_once("menu.php"); ?>


        <div>
            <h2>Postagem</h2>
            <?php
            if (isset($_SESSION ['msnexcluiupost'])) {
                echo $_SESSION ['msnexcluiupost'];
                unset($_SESSION ['msnexcluiupost']);
            }

            if (isset($_SESSION['msgpostedit'])) {
                echo $_SESSION['msgpostedit'];
                unset($_SESSION['msgpostedit']);
            }
            ?>
            <p><a href="http://localhost/site_1/financas.php">finanças</a></p>
        </div>




        <p><?php echo $registros; ?> Registros encontrados.</p>




        <div class="container-fluid" style="background-color:#ffffff;">
            <form method="get"> 
                <div class="form-row">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="filtro1" id="filtro1" placeholder="Search">
                        <div class="input-group-append">
                            <button class="btn btn-success" type="submit">Go</button>
                        </div>
                    </div>
                </div>
            </form>
            <table class="table table-striped table-hover">
                <thead>
                    <tr class="table-primary">
                        <th>Codigo</th>
                        <th>Imagem</th>
                        <th>Nomepost</th>
                        <th>Subtitulo</th>
                        <th>Descricao</th>
                        <th>Statuspost</th>
                        <th>Datapost</th>
                        <th>Idusuario</th>
                        <th>Alterar</th>
                        <th>Excluir</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($art as $row):
                        $idpostagem = $row['idpostagem'];
                        $imagempost = $row['imagempost'];
                        $nomepost = $row['nomepost'];
                        $textopost = $row['textopost'];
                        $subtitulopost = $row['subtitulopost'];
                        $descricaopost = $row['descricaopost'];
                        $statuspost = $row['statuspost'];
                        $datapost = $row['datapost'];
                        $idusuario = $row['idusuario'];
                        ?>

                        <tr>
                            <td><?php echo $row['idpostagem']; ?></td>      
                            <td>
                                <?php
                                if (empty($row['imagempost'])) {
                                    print "<img src='upload/nada.jpg' width='50px' height='50px'style= border-radius:50px;>";
                                } else {
                                    echo "<img src='uploadpostagem/" . $row['imagempost'] . "' width='80px' height='50px' >";
                                }
                                ?>
                            </td>  
                            <td style="color:  #cc00cc;"><?php echo $row['nomepost']; ?></td>   
                            <td><?php echo $row['subtitulopost']; ?></td>  
                            <td><?php echo $row['descricaopost']; ?></td>               
                            <td><?php echo $row['statuspost']; ?></td>  
                            <td><?php echo $row['datapost']; ?></td>               
                            <td><?php echo $row['idusuario']; ?></td>   
                            <td> 
                                <button name="idpostagem" type="button" class="btn btn-warning" data-toggle="modal" data-target="#myModaledit<?php echo $idpostagem; ?>">Alterar</button>
                                <div class="modal fade" id="myModaledit<?php echo $idpostagem; ?>">
                                    <div class="modal-dialog">
                                        <div class="modal-content">

                                            <!-- Modal Header -->
                                            <div class="modal-header">
                                                <h4 class="modal-title">Editar Postagem</h4>
                                                <button type="button" class="close" data-dismiss="modal">×</button>
                                            </div>

                                            <!-- Modal body -->
                                            <div class="modal-body">

                                                <form  method="post" action="editpostagem.php" enctype="multipart/form-data">

                                                    <div class="form-group">
                                                        <img src='uploadpostagem/<?php print $imagempost; ?>' width='80px' height='50px' >
                                                        <p>Clique para trocar a imagem<br></p>
                                                        <input class="form-control" type="file"  name="arquivo" >
                                                        <input class="form-control" type="hidden"  name="imagempost" value="<?php print $imagempost; ?>">  
                                                    </div>
                                                    <div class="form-group">
                                                        <p>Titulo<br></p><input  class="form-control" type="text" name="nomepost" id="nomepost"  placeholder="Titulo" value="<?php print $nomepost; ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <p>Descrição<br></p><input  class="form-control" type="text"  name="descricaopost" id="descricaopost"  placeholder="Descrição" value="<?php print $descricaopost; ?>">             
                                                    </div>
                                                    <div class="form-group">
                                                        <p>Status <br></p>
                                                        <select class="form-control" type="text" name="statuspost" id="statuspost" >
                                                            <option value="2">Secundario</option>
                                                            <option value="1">Administrador</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">          
                                                        <input class="form-control"type="hidden" name="idusuariosessao" id="idusuariosessao"  value="<?php print $idusuariosessao; ?>">               
                                                    </div>
                                                    <div class="form-group">    
                                                        <p>Texto<br></p> 
                                                        <input type="hidden" name="idpostagem" id="idpostagem"  value="<?php echo $idpostagem; ?>">

                                                        <textarea class="form-control" name="textopost<?php print $idpostagem; ?>" ><?php print $textopost; ?> </textarea>
                                                        <script>
                                                            CKEDITOR.replace('textopost<?php print $idpostagem; ?>');</script>
                                                        <p> <input name="salvar"  type="submit" ></p>
                                                    </div>
                                                </form>

                                            </div>

                                            <!-- Modal footer -->
                                            <div class="modal-footer">
                                                <button      type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                            </div>

                                        </div>



                                    </div>
                                </div>



                            </td>  


















                            <td> 
                                <button name="idpostagem" type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal<?php echo $idpostagem; ?>">Excluir</button>
                                <div class="modal fade" id="myModal<?php echo $idpostagem; ?>">
                                    <div class="modal-dialog">
                                        <div class="modal-content">

                                            <!-- Modal Header -->
                                            <div class="modal-header">
                                                <h4 class="modal-title">Excluir Postagem</h4>
                                                <button type="button" class="close" data-dismiss="modal">×</button>
                                            </div>

                                            <!-- Modal body -->
                                            <div class="modal-body">

                                                <form action="removerpostagem.php" method="post">
                                                    <p>Voce tem certeza que quer excluir o post <?php echo $nomepost ?></p>
                                                    <p> <?php echo $idpostagem; ?></p>

                                                    <input type="hidden" name="idpostagem" id="idpostagem"  value="<?php echo $idpostagem; ?>">
                                                    <input type="hidden" name="imagempost" id="imagempost"  value="<?php echo $imagempost; ?>">
                                                    <input type="submit" class="btn btn-danger" value="Excluir">
                                                </form>

                                            </div>

                                            <!-- Modal footer -->
                                            <div class="modal-footer">
                                                <button      type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                            </div>

                                        </div>



                                    </div>
                                </div></td>  
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
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
            trocar.addEventListener('click', () = > inicialmodal('modal_imagem'));
        </script>






    </body>

</html>

