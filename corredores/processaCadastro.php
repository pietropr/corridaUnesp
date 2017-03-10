<!doctype html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Corredores</title>
    <link href="../css/bootstrap.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
</head>
<body>
<?php
	//Chamada para o arquivo de conexão do software.
    include "../settings/connection.php";

	//Recuperação dos valores passados nos campos.
    $nPeito    = $_POST['nPeito'];
    $nome      = $_POST['nome'];
    $sexo      = $_POST['sexo'];
    $categoria = $_POST['categoria'];

	//Instrução de verificação de ID.
	$verificaID = "SELECT IDcorredores FROM corredores WHERE IDcorredores = $nPeito";
	$executaID = $conn -> prepare($verificaID);
	$executaID -> execute();

	//Instrução de verificação de Nome.
	$verificaCorredor = "SELECT nome FROM corredores WHERE nome = '$nome'";
	$executaCorredor = $conn -> prepare($verificaCorredor);
	$executaCorredor -> execute();

	//Montagem do contador dos IDs e dos Nomes.
	$contarID = $executaID -> rowCount();
	$contarUser = $executaCorredor -> rowCount();

	//Verifica se existe corredor com o ID inserido.
   	if($contarID > 0) {
?>
        <center>
            <div class="alert alert-danger">
                O <strong>Número de Peito</strong> que você digitou já existe no banco de dados!
            </div>
        </center>
        <meta HTTP-EQUIV='refresh' CONTENT='2;URL=cadastro.php'>
        <?php
			//Verifica se existe corredor com o Nome inserido. 
			}else if($contarUser > 0)
			{
		?>
            <center>
            	<div class="alert alert-danger">
            		O <strong>Nome</strong> do corredor que você digitou já existe no banco de dados!
             	</div>
            </center>
            <meta HTTP-EQUIV='refresh' CONTENT='2;URL=cadastro.php'>
        <?php
			}else{
			//Montagem da instrução de inserção das informações na base de dados.
            $insereBanco = "INSERT INTO corredores (IDcorredores, nome, categoria, sexo, situacao)
                            VALUES(:IDcorredores, :nome, :categoria, :sexo, :situacao)";
			
			//Execução da instrução de inserção dos corredores na base de dados.
            $executaInsere = $conn -> prepare($insereBanco);
            $executaInsere -> bindValue(':IDcorredores', $nPeito, PDO::PARAM_STR);
            $executaInsere -> bindValue(':nome', $nome, PDO::PARAM_STR);
            $executaInsere -> bindValue(':categoria', $categoria, PDO::PARAM_STR);
            $executaInsere -> bindValue(':sexo', $sexo, PDO::PARAM_STR);
            $executaInsere -> bindValue(':situacao', '1', PDO::PARAM_STR);
            $executaInsere -> execute();
			
			//Exibição da mensagem de erro.
            mysql_error();
			}
			
			//Verifica se foi possível a inclusão do corredor.	
			if($executaInsere){
		?>
            <center><div class="alert alert-success">Corredor cadastrado com sucesso!</div></center>
            <meta HTTP-EQUIV='refresh' CONTENT='2;URL=cadastro.php'>
       	<?php 
			}else{	
		?>
        	<center><div class="alert alert-danger">Erro ao cadastrar corredor!</div></center>
            <meta HTTP-EQUIV='refresh' CONTENT='2;URL=cadastro.php'>
		<?php } ?>