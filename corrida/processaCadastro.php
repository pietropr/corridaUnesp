<!doctype html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Informações da Corrida</title>
    <link href="../css/bootstrap.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
</head>
<body>
<?php
	//Chamada para o arquivo de conexão do software.
    include "../settings/connection.php";

	//Recuperação dos valores passados nos campos.
    $distancia    = $_POST['distancia'];
	$nome    = $_POST['nome'];
	$situacao     = '1';

	//Instrução de verificação de ID.
	$verificaID = "SELECT idCorrida FROM corrida;";
	$executaID = $conn -> prepare($verificaID);
	$executaID -> execute();

	//Montagem do contador dos IDs e da Distancia.
	$contarID = $executaID -> rowCount();

	//Verifica se existe o ID inserido.
   	if($contarID > 0) {

		//Instrução de atualização.
        $atualiza = "UPDATE corrida SET 
					 distanciaCorrida = :distancia,
					 nomeCorrida = :nome;";
			
		//Execução da instrução de atualização.		
        $executaAtualiza = $conn -> prepare($atualiza);
		$executaAtualiza -> bindValue(':distancia', $distancia, PDO::PARAM_STR);
		$executaAtualiza -> bindValue(':nome', $nome, PDO::PARAM_STR);
        $executaAtualiza -> execute();
		
		//Verifica se foi possível a inclusão do corredor.	
		if($executaAtualiza){
		?>
			<center><div class="alert alert-success">Informações atualizadas com sucesso!</div></center>
			<meta HTTP-EQUIV='refresh' CONTENT='2;URL=../include/menu.php'>
		<?php 
		}
	}else{
		//Montagem da instrução de inserção das informações na base de dados.
		$insereBanco = "INSERT INTO corrida (distanciaCorrida, nomeCorrida, situacao)
						VALUES(:distancia, :nome, :situacao)";
		
		//Execução da instrução de inserção dos corredores na base de dados.
		$executaInsere = $conn -> prepare($insereBanco);
		$executaInsere -> bindValue(':distancia', $distancia, PDO::PARAM_STR);
		$executaInsere -> bindValue(':nome', $nome, PDO::PARAM_STR);
		$executaInsere -> bindValue(':situacao', $situacao, PDO::PARAM_STR);
		$executaInsere -> execute();
		
		//Exibição da mensagem de erro.
		mysql_error();
	}
		
		//Verifica se foi possível a inclusão do corredor.	
		if($executaInsere){
	?>
		<center><div class="alert alert-success">Informações cadastradas com sucesso!</div></center>
		<meta HTTP-EQUIV='refresh' CONTENT='2;URL=../include/menu.php'>
	<?php 
		}	
	?>