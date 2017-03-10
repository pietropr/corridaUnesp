<?
    //Chamada para os arquivos de configurações do software.
	include "../settings/connection.php";

	//Variável para atualização da página de exibição pública.
    $offset = $_GET['off'];
	
	//Instrução de busca dos corredores.
    $funcionarios = "SELECT chegada FROM corredores;";
    $execFunc = $conn -> prepare($funcionarios);
    $execFunc -> execute();
	$countFunc = $execFunc -> rowCount();
?>
<!doctype html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Chegada em Tempo Real</title>
    <link href="../css/bootstrap.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
    <?php include "../include/favicon.php" ?>
</head>
<body class="tempoReal">
    <div class="col-sm-10 col-sm-offset-1">
    	<center>
            <hr style="margin-top: 50px !important;">
            <h2 align="center">Chegada em Tempo Real</h2>
            <p><strong>Atenção:</strong> Está página é carregada automáticamente a cada 10 segundos!</p>
            <hr>
        </center>
        <!-- Logo Corrida -->
        <div class="divCentralD">
            <table class="table table-bordered" style="width: 45%; float: left;" cellpadding="5" cellspacing="3">
                <tr class="active" >
                    <td align="center" style="background: #0093DD !important"><b>Nº Peito</b></td>
                    <td align="center" style="background: #0093DD !important"><b>Nome</b></td>
                    <td align="center" style="background: #0093DD !important"><b>Tempo Corrida</b></td>
                    <td align="center" style="background: #0093DD !important"><b>PACE</b></td>
                </tr>
                <?php
                    //Instrução SQL de seleção das informações dos corredores.
                    $corrida = "SELECT * FROM corredores ORDER BY tempo DESC LIMIT 15 OFFSET $offset";
                    $execCorrida = $conn -> query($corrida);
                
					//Laço de exibição dos resultados.	
					while($escreve = $execCorrida -> fetch(PDO::FETCH_ASSOC)){
						?>
						<tr>
							<?php
							//Se o tempo for diferente de "NULL" escreve.
							if( $escreve['tempo'] || NULL){
								echo "<td bgcolor='white'><center><b>$escreve[IDcorredores]</b></center></td>";
								echo "<td bgcolor='white'>$escreve[nome]</td>";
								echo "<td bgcolor='white'><center><b>$escreve[tempo]</b></center></td>";
								echo "<td bgcolor='white' align='center'><b>$escreve[pace]</td>";
							}
							?>
						</tr>
						<?php
					}
                ?>
            </table>
        </div>
        <!--Tabela direita-->
        <div class="dir">
            <table id="tabela" class="table table-bordered" cellpadding="5" 
            	   cellspacing="3" style="width: 45%; float: right">
                <tr class="active">
                    <td align="center" style="background: #0093DD !important"><b>Nº Peito</b></td>
                    <td align="center" style="background: #0093DD !important"><b>Nome</b></td>
                    <td align="center" style="background: #0093DD !important"><b>Corrida</b></td>
                    <td align="center" style="background: #0093DD !important"><b>PACE</b></td>
                </tr>
                <?php
					$offset = $offset + 15;
					
					//Instrução SQL para busca de mais informações dos corredores.
					$corrida2 = "SELECT * FROM corredores ORDER BY tempo DESC LIMIT 15 OFFSET $offset";
					$execCorrida2 = $conn -> query($corrida2);
					$i=0;
                
					//Laço de exibição das informações dos corredores.
					while($escreve2 = $execCorrida2 -> fetch(PDO::FETCH_ASSOC)){
						?>
						<tr id="tabela">
							<?php
							if( $escreve2['tempo'] || NULL){
								echo "<td bgcolor='white'><center><b>$escreve2[IDcorredores]</b></center></td>";
								echo "<td bgcolor='white'>$escreve2[nome]</td>";
								echo "<td bgcolor='white'><center><b>$escreve2[tempo]</b></center></td>";
								echo "<td bgcolor='white' align='center'><b>$escreve2[pace]</td>";
								$i= $i+1;
							}
							?>
						</tr>
						<?
					}
					
					$offset = $offset + 15;
					
					if( $i >= 15){
						echo "<meta HTTP-EQUIV='refresh' CONTENT='10;URL=tempoReal.php?off=$offset'>";
					}else{
						echo "<meta HTTP-EQUIV='refresh' CONTENT='10;URL=tempoReal.php?off=0'>";
					}
                ?>
            </table>
        </div>
    </div>
</body>
</html>
