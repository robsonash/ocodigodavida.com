<nav class="navbar navbar-expand-md bg-dark navbar-dark "style="background-color:black!important; "  id="logado">
    <?php
    if ((!isset($_SESSION['usuario']) == true) and (!isset($_SESSION['senha']) == true)) {
        unset($_SESSION['usuario']);
        unset($_SESSION['nome']);
        unset($_SESSION['senha']);
        unset($_SESSION['status']);
        unset($_SESSION['imagem']);
    }
    if ((isset($_SESSION['status']))) {
        if ($_SESSION['status'] == '1') {
            $nome = ($_SESSION['nome']);
            $idusuario = ($_SESSION['idusuario']);
            $usuario = ($_SESSION['usuario']);
            $status = ($_SESSION['status']);
            $imagem = ($_SESSION['imagem']);
            print"<div class='navbar-brand'><p>  <img data-toggle='modal' data-target='#myModal" . $idusuario . "'  class='imgbolinha ' src='upload/" . ((empty($imagem)) ? 'nada.jpg' : $imagem ) . "'  > </p>"
                    . "<p >     $nome <br>
            <a  href='financas.php'>Finanças</a>
            <a  href='logout.php'>Sair <br></a>
            </p>
           </div>";
        }
        if ($_SESSION['status'] == '2') {
            $nome = ($_SESSION['nome']);
            $idusuario = ($_SESSION['idusuario']);
            $usuario = ($_SESSION['usuario']);
            $status = ($_SESSION['status']);
            $imagem = ($_SESSION['imagem']);
            print"<div class='navbar-brand'><p>  <img data-toggle='modal' data-target='#myModal" . $idusuario . "'  class='imgbolinha ' src='upload/" . ((empty($imagem)) ? 'nada.jpg' : $imagem ) . "'  > </p>"
                    . "<p >     $nome <br>   
            <a  href='logout.php'>Sair <br></a>
            </p>
           </div>";
        }
    }
    ?>
    <div class="modal fade" id="myModal<?php echo $idusuario; ?>">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Mudar imagem</h4>
                    <button type="button" class="close" data-dismiss="modal">×</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">

                    <form action="upload.php" method="post"  enctype="multipart/form-data">    
                        <p>Mudar Imagem</p>
                        arquivo: <input type="file" required name="arquivo"> 
                        <input type="hidden" name="idusuario" id="idusuario"  value="<?php echo $idusuario; ?>">
                        <input type="submit" class="btn btn-primary" value="mudar">
                    </form>

                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button      type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>














    <?php
    if (isset($_SESSION ['msntamanhoexcedido'])) {
        echo $_SESSION ['msntamanhoexcedido'];
        unset($_SESSION ['msntamanhoexcedido']);
    }
    if (isset($_SESSION ['msnexcluiuimagem'])) {
        echo $_SESSION ['msnexcluiuimagem'];
        unset($_SESSION ['msnexcluiuimagem']);
    }
    if (isset($_SESSION ['msnmudouimagem'])) {
        echo $_SESSION ['msnmudouimagem'];
        unset($_SESSION ['msnmudouimagem']);
    }
    if (isset($_SESSION ['msnnaocadastrou'])) {
        echo $_SESSION ['msnnaocadastrou'];
        unset($_SESSION ['msnnaocadastrou']);
    }
    if (isset($_SESSION ['msnotiponaoepermitido'])) {
        echo $_SESSION ['msnotiponaoepermitido'];
        unset($_SESSION ['msnotiponaoepermitido']);
    }
    ?>
















    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="collapsibleNavbar">
        <ul class="navbar-nav ">
            <li class="nav-item" >
                <a class="nav-link "style="color:white!important;" href="http://localhost/site_1/">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" style="color:white!important;"href="http://localhost/site_1/login">Login</a>
            </li>
            <li class="nav-item">
                <a class="nav-link "style="color:white!important;" href="http://localhost/site_1/contato">Contato</a>
            </li>    
        </ul>
    </div>  
</nav>