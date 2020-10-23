<?php
if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true))
{
  unset($_SESSION['login']);
  unset($_SESSION['senha']);
  header('location:index.php');
  }else{
            session_start();
include_once("header.php");
include_once("conexao.php");
$conexao = conectar();
$articles = post();
$imagem = $_SESSION['imagem'];
print" Logado <br>  ";
if (empty($imagem)) {
    print"<img src='upload/nada.jpg' width='50px' height='50px' class='trocar' style= border-radius:50px;>";
} else {
    print"<img src='upload/$imagem' width='50px' height='50px'class='trocar'style= border-radius:50px;>";
}
print $_SESSION['usuario'];
  print "<a href='logout.php'>         sair</a>";}
?>


<div>
    <h2>Clientes</h2>
</div>


<p>Resultado da pesquisa <strong><?php echo $filtro; ?> </strong></p>
<p><?php echo $registros; ?> Registros encontrados.</p>
<div class="pesquisar">

    <form  method="get" action=>         
        <label for="filtro">Usuarios</label>
        <input type="text"  name="filtro" id="email">
        <button type="submit" >Procurar</button>

    </form> 
</div>
<div class="tabela">

    <table>
        <thead>
            <tr>
                <th>Codigo</th>
                <th>Usuario</th>

            </tr>
        </thead>
        <tbody>
<?php foreach ($articles as $row) { ?>

                <tr>
                    <td><?php echo $row['idusuario']; ?></td>               
                    <td><?php
                        if (empty($row['imagem'])) {
                            print "<img src='upload/nada.jpg' width='50px' height='50px'style= border-radius:50px;>" . $row['usuario'];
                        } else {


                            echo "<img src='upload/" . $row['imagem'] . "' width='50px' height='50px' style= border-radius:50px;>" . $row['usuario'];
                        }
                        ?></td>                         
                </tr>
<?php } ?>
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
            <input class="btn" type="submit" >salvar 
        </form>
    </div>
</div>
<script>
    function inicialmodal (modalID){
    const modal = document.getElementById(modalID);
    if(modal){
        modal.classList.add('mostrar');
    
modal.addEventListener('click', (e) =>{
    if(e.target.id == modalID || e.target.className == 'fechar'){
        modal.classList.remove ('mostrar');
    }
});

        }}
const trocar = document.querySelector('.trocar');
trocar.addEventListener('click',() => inicialmodal('modal_imagem'));
</script>






</body>

</html>

