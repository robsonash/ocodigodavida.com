 <?php
$conexao = null;
function conectar() {



    $hostname = "localhost";
    $user = "root";
    $password = "";
    $database = "ocodig64_codgniter";
    $conexao = mysqli_connect($hostname, $user, $password, $database);
    if (!$conexao) {
        print "falha na conexao";
    }
    return $conexao;
}

function fecharconexao($conexao) {

    mysqli_close($conexao);
}

function f() {
    $conexao = conectar();
    global $registros;
    $filtro = isset($_GET['filtro']) ? $_GET['filtro'] : "";
    $sql = "SELECT * FROM `usuarios` WHERE `usuario` LIKE '%$filtro%' ORDER BY `usuario`";
    $consulta = mysqli_query($conexao, $sql);
    global $filtro;
    $registros = mysqli_num_rows($consulta);
    $articles = array();
    while ($row = mysqli_fetch_assoc($consulta)) {
        $articles[] = $row;
    }
    return $articles;
}




function postagem() {
    $conexao = conectar();
    global $registros;
    $filtro1 = isset($_GET['filtro1']) ? $_GET['filtro1'] : "";
    $sql = "SELECT * FROM `postagem` WHERE `nomepost` LIKE '%$filtro1%' ORDER BY `nomepost`";

    $consulta = mysqli_query($conexao, $sql);
    global $filtro1;
    $registros = mysqli_num_rows($consulta);
    $art = array();
    while ($row = mysqli_fetch_assoc($consulta)) {
        $art[] = $row;
    }
    return $art;
}


function post() {
    $conexao = conectar();
    global $registros;
    $filtro = isset($_GET['filtro']) ? $_GET['filtro'] : "";
    $p = $_GET['p'];
    $sql = "SELECT * FROM postagem WHERE id.usuario = $p";
    $consulta = mysqli_query($conexao, $sql);
    global $filtro;
    $articles = array();
    while ($row = mysqli_fetch_assoc($consulta)) {
        $articles[] = $row;
        $linhas = mysqli_affected_rows($conexao);
 
    }
    return $articles;
}
function post1() {
    $conexao = conectar();
    global $registros;
    $filtro = isset($_GET['filtro']) ? $_GET['filtro'] : "";
    $sql = "SELECT * FROM postagem WHERE  statuspost LIKE '%2%'";
    $consulta = mysqli_query($conexao, $sql);
    global $filtro;
    $a = array();
    while ($row = mysqli_fetch_assoc($consulta)) {
        $a[] = $row;
        $linhas = mysqli_affected_rows($conexao);
 
    }
    return $a;
}
function post2() {
    $conexao = conectar();
    global $registros;
    $filtro = isset($_GET['filtro']) ? $_GET['filtro'] : "";
    $sql = "insert into postagem WHERE  statuspost LIKE '%2%'";
    $consulta = mysqli_query($conexao, $sql);
    global $filtro;
    $b = array();
    while ($row = mysqli_fetch_assoc($consulta)) {
        $b[] = $row;
        $linhas = mysqli_affected_rows($conexao);
 
    }
    return $b;
} 
