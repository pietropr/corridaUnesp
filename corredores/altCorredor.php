<?php
	//Chamada para os arquivos de configurações do software.
    include "../settings/connection.php";
    include "../settings/restricted.php";

	//Recuperação do ID do corredor.
    $idCorredor = $_GET['id'];

	//Instrução SQL de seleção das informações do corredor.
    $consultaCorredor = "SELECT * FROM corredores WHERE IDcorredores = $idCorredor";
    $executaConsulta = $conn -> prepare($consultaCorredor);
    $executaConsulta -> execute();

	//Armazenamento das informações do corredor em uma Matriz.
    $fetchCorredor = $executaConsulta -> fetch(PDO::FETCH_ASSOC);

    //Verifica o clique do botão e exibe a funcionalidade.
    if ($_POST['editar']) {
		
		//Recuperação dos dados do corredor.
        $nPeito     = $_POST['nPeito'];
        $nome       = $_POST['nome'];
        $categoria  = $_POST['categoria'];
        $sexo       = $_POST['sexo'];
		
		//Instrução de atualização.
        $atualiza = "UPDATE corredores SET 
					IDcorredores = :nPeito, 
					nome = :nome, 
					categoria = :categoria, 
					sexo = :sexo 
					WHERE IDcorredores = $idCorredor";
			
		//Execução da instrução de atualização.		
        $executaAtualiza = $conn -> prepare($atualiza);
		$executaAtualiza -> bindValue(':nPeito', $nPeito, PDO::PARAM_STR);
		$executaAtualiza -> bindValue(':nome', $nome, PDO::PARAM_STR);
		$executaAtualiza -> bindValue(':categoria', $categoria, PDO::PARAM_STR);
		$executaAtualiza -> bindValue(':sexo', $sexo, PDO::PARAM_STR);
        $executaAtualiza -> execute();

		//Verifica se a instrução foi executada com sucesso e atualiza a página.
        if($executaAtualiza) { ?>
            <center style="margin-top: 10px; margin-bottom: -25px;">
            	<div class="alert alert-success">Dados atualizados com sucesso</div>
            </center>
            <meta HTTP-EQUIV='refresh' CONTENT='1;URL=listaCorredores.php'>
<?php }} ?>
<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Alteração de Corredor</title>
    <link href="../css/bootstrap.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
    <?php include "../include/favicon.php" ?>
</head>
<body class="alteracao">
    <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-4">
        	<center style="margin-top: 50px !important;">
                <hr>
                <h3>Alteração de Corredor</h3>
                <hr>
            </center>
            <form action="" method="post" name="alterar">
                <fieldset>
                    <strong>Nº de Peito:</strong> 
                    <input type="number" name="nPeito" class="input-group form-control" 
                           value="<?php echo $fetchCorredor['IDcorredores'];  ?>" required>
                </fieldset>
                <fieldset>
                    <strong>Nome:</strong> 
                    <input type="text" name="nome" class="input-group form-control" 
                    value="<?php echo $fetchCorredor['nome'];  ?>" required>
                </fieldset>
                <fieldset>
                    <strong>Categoria:</strong> 
                    <select name="categoria" class="form-control" required>
                        <option selected value>Escolha a categoria do corredor...</option>
                        <option value="Aluno">Aluno</option>
                        <option value="Docente">Docente</option>
                        <option value="Funcionario">Funcionario</option>
                    </select>
                </fieldset>
                <fieldset>
                    <strong>Sexo:</strong> 
                    <select name="sexo" class="form-control" required>
                        <option selected value>Escolha o sexo do corredor...</option>
                        <option value="Masculino">Masculino</option>
                        <option value="Feminino">Feminino</option>
                    </select>
                </fieldset>
                <input type="submit" value="Salvar Edição" class="but-editar btn btn-warning btn-block" name="editar">
                <a href="listaCorredores.php" class="btn btn-primary btn-block">Voltar para a lista de corredores</a>
            </form>
        </div>
        <div class="col-sm-4"></div>
    </div>
</body>
</html>
