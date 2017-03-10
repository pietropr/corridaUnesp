<?php 
	//Chamada para os arquivos de configurações do software.
	include "../settings/restricted.php";
	include "../settings/connection.php";

	//Instrução de atualização do campo de largada na base de dados.
    $select = "select largada from corredores;";
    $selectLargada = $conn -> prepare($select);
    $selectLargada -> execute();
	$fetchLargada = $selectLargada -> fetch(PDO::PARAM_STR);
	
	//Condição para execução da largada.
	if($fetchLargada['largada'] == NULL){

		//Instrução de atualização do campo de largada na base de dados.
		$insere = "update corredores set largada = now();";
		$executaLargada = $conn -> prepare($insere);
		$executaLargada -> execute();
		?>
        	<meta HTTP-EQUIV='refresh' CONTENT='1;URL=../include/menu.php'>
        <?php
	}else{
	?>
    	<body bgcolor="red"></body>
    	<meta HTTP-EQUIV='refresh' CONTENT='1;URL=../include/menu.php'>
    <?php	
	}
?>