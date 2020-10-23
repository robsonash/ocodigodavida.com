<?php

$engines = ["honda, honda, honda, honda, renault, renault, ford, renault, renault, renault,
             mercedes, mercedes, ferrari, ferrari, ferrari,ferrari, ferrari, renault, renault, ferrari,
             mercedes, mercedes, renault, renault, renault, renault, mercedes, mercedes, mercedes, mercedes,
             mercedes, mercedes"];

$enginesChamp = [];

foreach($engines as $engine){
    $motores = explode(",", $engine);
    foreach($motores as $motor){
        $motor = trim($motor);

        if(isset($enginesChamp[$motor])){
            $enginesChamp[$motor]++;
        }else{
           $enginesChamp[$motor] = 1;
        }
    }
}

arsort($enginesChamp);
$MotorCampeao = array_keys($enginesChamp);
$numeroTitulos = array_values($enginesChamp); 
$qtd = count($enginesChamp);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rank</title>
</head>
<body>
    <table width="500" border="1">
        <thead>
            <th>Posição</th>
            <th>Motor</th>
            <th>Número de titulos</th>
        </thead>
        <tbody>
                <?php for($x = 0; $x < $qtd; $x++): ?>
                <tr>
                    <td><?= ($x+1); ?></td>
                    <td><?= $MotorCampeao[$x]; ?></td>
                    <td><?= $numeroTitulos[$x]; ?></td>
                </tr>
                <?php endfor; ?>
        </tbody>
    </table>
</body>
</html>
