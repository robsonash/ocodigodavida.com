<?php

if(isset($_POST['salvar'])){
    
   // echo "<pre>", print_r($_POST),"</pre>";
   // echo "<pre>", print_r($_FILES),"</pre>";
   // echo "<pre>", print_r($_FILES['arquivo']),"</pre>";
        echo "<pre>", print_r($_FILES['arquivo']['name']),"</pre>";
    $arquivoimagem = $_FILES['arquivo']['name'];
    $target = 'uploadpostagem/' . $arquivoimagem;
    move_uploaded_file($_FILES ['arquivo']['tmp_name'],$target);
    
}