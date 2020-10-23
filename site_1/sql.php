<?php

$sql = "SELECT postagem.*,usuarios.* FROM postagem
INNER JOIN usuarios ON postagem.idusuario = usuarios.idusuario WHERE idpostagem = $p ";



$sqlprincipal = "SELECT postagem.*,usuarios.* FROM postagem
INNER JOIN usuarios ON postagem.idusuario = usuarios.idusuario WHERE idpostagem = '0' ";




$sql2 =" SELECT postagem.*,comentario.*, usuarios.usuario, usuarios.nome, usuarios.idusuario, usuarios.data, usuarios.imagem, usuarios.status FROM postagem
INNER JOIN usuarios ON postagem.idusuario = usuarios.idusuario
INNER JOIN comentario ON postagem.idpostagem = comentario.idpostagem where postagem.idpostagem = 0";