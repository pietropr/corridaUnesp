<?php
	//Chamada para os arquivos de configuração do software.
    require "../settings/restricted.php";
    require "../settings/connection.php";

	//Recupera o número de peito do corredor.
    $id = $_POST['nPeito'];

    //Instrução para verificar se corredor já foi finalizado.
    $verifica = "SELECT chegada FROM corredores WHERE IDcorredores = $id";
    $executaVerificacao = $conn -> prepare($verifica);
    $executaVerificacao -> execute();

	//Armazenamento da instrução em um vetor.
    $fetch = $executaVerificacao -> fetch(PDO::PARAM_STR);
	
	//Verifica se o corredor já finalizou a corrida.
    if($fetch['chegada'] != NULL ){ 
	?><body bgcolor="red"></body>
    	
    	<meta HTTP-EQUIV='refresh' CONTENT='0;URL=afericao.php'>
	<?php  
	} else {

        //Finaliza a corrida do atleta através do número de peito.
        $encerrar = "update corredores  set chegada = now() WHERE IDcorredores = $id ";
        $executaChegada = $conn -> prepare($encerrar);
        $executaChegada -> execute();

        //Apresenta o tempo total de corrida do atleta.
        $total = "update corredores  set tempo = TIMEDIFF(chegada,largada) WHERE  IDcorredores = $id ";
        $executaTotal = $conn -> prepare($total);
        $executaTotal -> execute();

        //Recuperação do tempo da prova para cálculo do PACE
        $pegaTempo = "SELECT tempo FROM corredores WHERE IDcorredores = $id";
        $execTempo = $conn -> prepare($pegaTempo);
        $execTempo -> execute();

		//Recuperação da distância da prova para cálculo do PACE.
        $pegaDistancia = "SELECT distanciaCorrida FROM corrida WHERE idCorrida = 1";
        $execDistancia = $conn -> prepare($pegaDistancia);
        $execDistancia -> execute();

		//Inserção de dados em um vetor.	
        $fetchTempo = $execTempo -> fetch(PDO::FETCH_ASSOC);
        $fetchDistancia = $execDistancia -> fetch(PDO::FETCH_ASSOC);

        //Armazenamento do tempo e distância em variáveis.
        $tempo = $fetchTempo['tempo'];
        $distancia = $fetchDistancia['distanciaCorrida'];

        //...INICIO DO CÁLCULO DO PACE...//
        $t = explode(':', $tempo);
        $j = 0;
        
		for ($i = 1; $i <= 3; $i++) {
            $newT[$i] = "$t[$j]";

            $j++;
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
        
		//Função para explosão da variável.
		function dec_min($num) {
            $num = number_format($num,2);
            $num_temp = explode('.', $num);
            $num_temp[1] = $num-(number_format($num_temp[0],2));
            $saida = number_format(((($num_temp[1]) * 60 / 100)+$num_temp[0]),2);
            $saida = strtr($saida,'.',':');
            return $saida;
        }
		
        $pace = $tempoFinal/$distancia;
        $paceH = dec_min($pace);
		//...FIM DO CÁLCULO DO PACE.
		
		//Atualização do campo PACE na base de dados.
        $Upace = "update corredores set pace = '$paceH' where IDcorredores = $id ";
        $executaPace = $conn -> prepare($Upace);
        $executaPace -> execute();

		//Redirionamento automático para a página de aferição.
        header("Location: afericao.php");
    }
?>
