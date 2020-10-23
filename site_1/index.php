<?php

 $url = isset($_GET['url'])?$_GET['url'] : '/';

$pages = [
    '/' => 'home.php',
    '/conexao' => 'conexao.php',
    '/login' => 'Login.php',
    '/contato' => 'contato.php',
    '/cadastrausuario' =>'cadastrausuario.php',
    '/confirmar_email' => 'confirmar_email.php',
    '/financas' => 'financas.php',
    '/logout' => 'logout.php',
    '/processacadastro' => 'processacadastro.php',
    '/processalogin' => 'processalogin.php',
    '/upload' => 'upload.php',
    '/loginf' => 'loginf.php',
    '/face' => 'face.php',
    '/admin' =>'admin.php',
    '/postagem' =>'postagem.php',
    '/postagens' =>'postagens.php',
    '/pastaimagem' =>'pastaimagem.php',
    '/post' => 'post.php',
    '/descontoinss' =>'holerite.php'
    
];
$include = null;

if ($url == null) {
    $include =  $pages['/'];
    
} else {
  
    foreach ($pages as $pagina => $arquivo) {
        if ($url == $pagina) {
            $include = $arquivo;
        }
    }
}
if($include){
    include $include ;
    
}else{
    include "error.php";
}


