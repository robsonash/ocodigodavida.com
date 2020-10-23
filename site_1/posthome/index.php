<?php
$sql1 = "SELECT * FROM postagem order by idpostagem";
$consulta1 = mysqli_query($conexao, $sql1);
$a = array();
while ($row = mysqli_fetch_assoc($consulta1)) {
    $a[] = $row;
    $linhas = mysqli_affected_rows($conexao);
}
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>O Código da Vida</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/css?family=Mali&display=swap" rel="stylesheet">
             <link rel="icon" type="image/png" href="https://ocodigodavida.com/folha.png">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="../footer/footer.css">
        <script src="jquery-3.4.1.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
        <style>
            html{
                height: 100%;
            }
            body{
                padding: 10px;
                height: 100%;

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
            .desktop{
                display:block;
            }
            .celular{padding-bottom: 150px;
                     padding-top: 40px;
                display:none;
            }
            .foo{
                position:absolute;
            }
            @media  screen and (max-width: 700px){

                .desktop{
                    display:none;
                }
                .celular{
                    display:block;
                }
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
        <div style="min-height:100%; position: relative;">
            
            
            <?php include_once("menu.php"); ?>
            <div class="col-sm-4 celular col-md-4 mt-1" style="width: 100%;   ">
                <?php foreach ($a as $row) { ?> 
                    <a href='http://localhost/site_1/?p=<?php print $row["idpostagem"] ?>'>
                        <div class="card p-0 efeito " style="width:100%;margin-bottom: 5px; border: none;">
                            <h2 class="font-weight-bold mb-3 text-primary">   <?php echo $row['nomepost']; ?></h2>
                            <img class='card-img-top mt-2'  src='uploadpostagem/<?php print $row['imagempost'] ?> '>
                            <div class="card-body">
                                <p class="card-text"><?php echo $row['descricaopost']; ?> </p>
                            </div>
                        </div></a>
                <?php } ?> 
                <div style="clear: both;"></div>
            </div>


            <div class="container">
                <div class="col mt-2 desktop" >
                    <?php foreach ($a as $row) { ?> 
                        <div class="row efeito ">
                            <div class="col-2" >
                                <img class='img-fluid mt-2' style="width:100%; height:90%"  src='uploadpostagem/<?php print $row['imagempost'] ?> '>
                            </div>
                            <a href='http://localhost/site_1/?p=<?php print $row["idpostagem"] ?>'>   <div class="col" >
                            <h4 class="font-weight-bold mb-1 text-primary">   <?php echo $row['nomepost']; ?></h4>
                          <p><?php echo $row['descricaopost']; ?> </p>

                                </div></a>
                        </div>
                    <?php } ?> 

                </div>
                <div style="clear: both;"></div>
            </div>  
            
            
            
            <?php include_once("./footer/footer.php"); ?> 
        </div>












    <script src= "jquery-3.4.1.min.js" ></script>
    </body>
</html>
