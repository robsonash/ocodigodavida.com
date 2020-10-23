<?php
include_once("conexao.php");
$conexao = conectar();
include_once("header.php");
?>
 <style>
            .b{
                margin: 10px;
            }
            .active, img:hover {
                opacity: 0.5;
                border: 3px solid #3333ff;
            }


        </style>

<section>
    <?php
    $diretorio = "upload/";
    $imagens = glob($diretorio . "*.{jpg,jpeg,png}", GLOB_BRACE);
    foreach ($imagens as $ima) {
        echo " <img class='b' style=' width: 100px; height: 100px;'  src='" . $ima . "'>";
    }
    ?>
</section>









</body>
<script>

var btns = document.getElementsByClassName("b");

for (var i = 0; i < btns.length; i++) {
  btns[i].addEventListener("click", function() {
    var current = document.getElementsByClassName("active");
 
    if (current.length > 0) {
      current[0].className = current[0].className.replace(" active", "");
    }
    // Add the active class to the current/clicked button
    this.className += " active";
  });
}
</script>
</html

