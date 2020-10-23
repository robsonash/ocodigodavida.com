<?php
session_start();
include_once("conexao.php");
$conexao = conectar();
 include_once("verificação.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>O Código da Vida</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/css?family=Mali&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="jquery-3.4.1.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    </head>
    <?php include_once("menu.php"); ?>
    <body>
        <h1 class="text-center">Simulação do novo cálculo do inss</h1>
        <h2 class="text-center text-success" style="margin-top: 55px;">Salario</h2>
        <div class="form-group d-md-flex justify-content-md-center align-items-md-center">
            <h4 style="margin-bottom: 0;">R$:</h4><input  type="number" id="salario" min="0" value="0" onkeyup="result(salario)"></div>
        <h2 class="text-center text-success" id="psalarioliquidosemvt" style="margin-top: 55px;font-size: 68px;"></h2>
        <div class="container">
            <div class="col">
                <p id="psalariobruto"></p>
                <p id="pinss"></p>
                <p id="pdescontoinss"></p>
                <p id="pdescontovt"></p>
                Comisão<input  type="number" id="comissao" min="0" value="0" onkeyup="result(salario)">
                <br><p id="pcomissao"></p>
                <p id="psalarioliquido"></p>   
            </div>
        </div>
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>

        <script>
                    document.getElementById("salario").addEventListener("input", el => {
                        /* Verifica se o valor alterado é menor que 0 */
                        if (el.target.value <= parseInt(el.target.getAttribute("min"))) {

                            /* Caso seja, define o valor 0 */
                            el.target.value = 0;
                        }
                    });
                    document.getElementById("comissao").addEventListener("input", el => {
                        /* Verifica se o valor alterado é menor que 0 */
                        if (el.target.value <= parseInt(el.target.getAttribute("min"))) {

                            /* Caso seja, define o valor 0 */
                            el.target.value = 0;
                        }
                    });




                    //var salario = document.getElementById("salario").value;
                    // var comissao = document.getElementById("comissao").value;
                    //var salarioliquido = document.getElementById("salarioliquido");




                    function result(valor) {
                        var psalariobruto = document.getElementById("psalariobruto");
                        var pinss = document.getElementById("pinss");

                        var pdescontoinss = document.getElementById("pdescontoinss");
                        var pdescontovt = document.getElementById("pdescontovt");
                        var pcomissao = document.getElementById("pcomissao");
                        var psalarioliquidosemvt = document.getElementById("psalarioliquidosemvt");
                        var psalarioliquido = document.getElementById("psalarioliquido");
                        var comissao = document.getElementById("comissao").value;
                        valor = document.getElementById("salario").value;



                        valor = parseFloat(valor);
                        comissao = parseFloat(comissao);


                        var valorbase = valor;
                        valor = valor + comissao;
                        var bruto = valor;

                        var base1 = 78.37;
                        var base2 = 94.01;
                        var base3 = 125.37;
                        var base4 = 415.33;
                        var inss;
                        if (valor <= 1045) {
                            inss = 7.5;
                            var descontoinss = (valor * inss) / 100;

                        }

                        if (valor > 1045 && valor <= 2089.60) {

                            //passo1 pega o valor do salario e tira o teto da primeira faixa
                            var passo1 = valor - 1045;
                            //passo 2 pega o valor do passo1 e ve quanto é 9% que é o teto da faixa 2 
                            var passo2 = passo1 * 9 / 100;
                            //soma da base1 que é  7.5  por cento do teto da primeira faixa
                            var descontoinss = base1 + passo2;

                            //porcentagem do inss
                            inss = (descontoinss / valor) * 100;

                        }


                        if (valor > 2089.60 && valor <= 3134.40) {
                            //passo1 pega o valor do salario e tira o teto da segunda faixa
                            var passo1 = valor - 2089.60;
                            //passo 2 pega o valor do passo1 e ve quanto é 12% que é o teto da faixa 2 
                            var passo2 = passo1 * 12 / 100;

                            var descontoinss = base1 + base2 + passo2;

                            //porcentagem do inss
                            inss = (descontoinss / valor) * 100;

                        }


                        if (valor > 3134.40 && valor <= 6101.06) {
                            //passo1 pega o valor do salario e tira o teto da terceira faixa
                            var passo1 = valor - 3134.40;
                            //passo 2 pega o valor do passo1 e ve quanto é 14% que é o teto da faixa 3 
                            var passo2 = passo1 * 14 / 100;

                            var descontoinss = base1 + base2 + base3 + passo2;

                            //porcentagem do inss
                            inss = (descontoinss / valor) * 100;

                        }
                        if (valor >= 6101.07) {
                            inss = (713.08 / valor) * 100;
                            var descontoinss = base1 + base2 + base3 + base4;
                        }



                        // var inss = valor * descontoinss / 100;
                        var liquidosemvt = valor - descontoinss;
                        var valetransporte = valorbase * 6 / 100;
                        var liquido = (valor - descontoinss) - valetransporte;

                        psalariobruto.innerHTML = "Salario Bruto = " + bruto;
                        pinss.innerHTML = "Valor da porcentagem de desconto do inss = " + inss.toFixed(2) + "%";
                        pdescontoinss.innerHTML = "Valor do desconto do inss = " + descontoinss.toFixed(2) + " reais";
                        pdescontovt.innerHTML = "Valor do desconto de 6% do vale transporte sobre o salario = " + valetransporte.toFixed(2) + " reais";
                        pcomissao.innerHTML = "Comissão = " + comissao.toFixed(2) + " reais";

                        psalarioliquido.innerHTML = "Valor do salario liquido com descontos e desconto do vale transporte = " + liquido.toFixed(2) + " reais <br>";
                        psalarioliquidosemvt.innerHTML = "R$: " + liquidosemvt.toFixed(2);



                        // return salarioliquido.innerHTML = "Salario bruto = " + bruto + "<br>Descontos<br>valor da porcentagem de desconto do inss = " + descontoinss + "%<br> valor do desconto do inss = " + inss.toFixed(2) + " reais ,<br>valor do desconto de 6% do vale transporte sobre o salario = " + valetransporte.toFixed(2) + " reais ,<br>" + "Proventos <br>Comissão = " + comissao.toFixed(2) + "<br>valor do salario liquido com desconto = " + liquido.toFixed(2) + " reais ";
                    }




        </script>
    </body>
</html>