<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>O Código da Vida</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE-edge">
        <link href="https://fonts.googleapis.com/css?family=Mali&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
         <script src="jquery-3.4.1.min.js"></script>
        <style>
            body{
                padding: 10px;
             

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
                background-image: url(http://localhost/site_1/imagens/fundo%20degrade%20-%20Verde.png);
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
                
                   .rowsem{ margin-right: none;
                     margin-left: none;
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
                     .celular{
                         display:none;
                     }
                     @media  screen and (max-width: 360px){
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

           
    
       
            <button id="LoadWebApi">Carregar aqui </button>
            <table id="tabela" border="1">
                <thead>
                    <tr>
                        <th>Id</th>
                         <th>Title</th>
                         <th>Body</th>
                    </tr>
                   </thead> 
                   <tbody>
                </tbody>
             
            </table>   
           

                 



 <script>
            $("#LoadWebApi").click(function(){
               $.ajax({
                   type:"GET",
                   url:"http://localhost/site_1/json.json",
                   dataType:"json",
                   contentType:"application/json",
                   crossDomain:true,
                   success: function (data){
                       $.each(data, function(i,item){
                           var row = "<tr>" +
                                   "<td>" + item.id + "</td>" +
                                   "<td>" + item.title + "</td>" +
                                   "<td>" + item.body + "</td>" +
                                   "</tr>";
                           $("#tabela>tbody").append(row);
                       });
                   },
               }); 
            });
             
            </script>
         </body>

  

    </html>
