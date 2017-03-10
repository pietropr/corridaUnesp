<?php

    require "../settings/connection.php";




$pegaTempo = "SELECT tempo FROM corredores WHERE IDcorredores = 2";
$execTempo = $conn -> prepare($pegaTempo);
$execTempo -> execute();


$pegaDistancia = "SELECT distanciaCorrida FROM corrida WHERE idCorrida = 1";
$execDistancia = $conn -> prepare($pegaDistancia);
$execDistancia -> execute();


$fetchTempo = $execTempo -> fetch(PDO::FETCH_ASSOC);

$fetchDistancia = $execDistancia -> fetch(PDO::FETCH_ASSOC);


//pega o tempo do corredor
$tempo = $fetchTempo['tempo'];

//pega a distancia
$distancia = $fetchDistancia['distanciaCorrida'];


//Calculo do PACE
$t = explode(':', $tempo);

$j = 0;
for ($i = 1; $i <= 3; $i++) {
    $newT[$i] = "$t[$j]";

    $j++;
}


function dec_min($num) {
    $num = number_format($num,2);
    $num_temp = explode('.', $num);
    $num_temp[1] = $num-(number_format($num_temp[0],2));
    $saida = number_format(((($num_temp[1]) * 60 / 100)+$num_temp[0]),2);
    $saida = strtr($saida,'.',':');
    return $saida;

}
    $passa = NULL;
    if ($newT[1] == '01') {
        $newT[1] = '60';
        $passa = $newT[1];
        $newT[1] = '00';
        $newT[2] = $newT[2] + $passa;
    } else {
        $newT[1];
    }

    $tempoFinal = $newT[1];
    $tempoFinal .= $newT[2];
    $tempoFinal .= '.' . $newT[3];


    $pace = ($tempoFinal/$distancia);
    $paceH = dec_min($pace);

echo "<p>".$tempoFinal."</p>";
echo "<p>".$distancia."</p>";
echo "<p>".$paceH."</p>";
