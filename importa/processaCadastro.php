<!doctype html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Importação de Corredores</title>
    <link href="../css/bootstrap.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
</head>
<body>
<?php
	//Chamada para o arquivo de conexão do software.
    include "../settings/connection.php";

	//Recuperação dos valores passados nos campos.
    $arquivo = $_POST['arquivo'];
	
	//Tratamento de inversão de barras para a importação dos arquivos.
	$caminhoTratado = str_replace("\\", "\\\\", $arquivo);
	
	//Instrução de importação dos dados.
	$importaCorredores = "LOAD DATA LOW_PRIORITY LOCAL INFILE '$caminhoTratado' 
						  INTO TABLE corridaunespdb.corredores CHARACTER SET latin1 
						  FIELDS TERMINATED BY ';';";
						  
	$executaImportacao = $conn -> prepare($importaCorredores);
	$executaImportacao -> execute();
	
	//Verifica se foi possível importar os dados dos corredores.
	if($executaImportacao){
		
		echo mysql_error();
	?>
    	<center><div class="alert alert-success">Corredores importados com sucesso!</div></center>
        <!-- <meta HTTP-EQUIV='refresh' CONTENT='2;URL=../include/menu.php'> -->
    <?php
	}else{
	?>
    	<center><div class="alert alert-danger">Houve erro ao importar os dados!</div></center>
        <meta HTTP-EQUIV='refresh' CONTENT='2;URL=../include/menu.php'>
    <?php
	}
?>
</body>
</html>