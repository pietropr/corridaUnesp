<?php 
	//Chamada para os arquivos de configuração do software.
	include "../settings/restricted.php"; 
	include "../settings/connection.php";
?>
<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Importação de Corredores</title>
    <link href="../css/bootstrap.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
    <?php include "../include/favicon.php"; ?>
</head>
<body class="cadastro">
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
            <div class="box">
            	<hr>
                <h3>Importação de Corredores</h3>
                <hr>
                <form action="processaCadastro.php" method="post">
                    <p>
                    	<strong>Insira o Caminho Completo do Arquivo de Importação:</strong> 
                    	<input type="text" name="arquivo" id="arquivo" class=" form-control form-inline" required>
                    </p>
                    <p>
                    	<input type="submit" value="Importar Corredores" name="importa" 
                        	   class="btn btn-success btn-block">
                        <a href="../include/menu.php" name="voltar" class="btn btn-info btn-block">Voltar para o Menu</a>
                    </p>

                </form>
            </div>
        </div>
        <div class="col-sm-3"></div>
    </div>
	<script type="text/javascript" src="../javaScript/jquery-1.11.3.min.js"></script>
    <script type="text/javascript" src="../javaScript/jquery-validation-1.15.0/dist/jquery.validate.js"></script>
</body>
</html>