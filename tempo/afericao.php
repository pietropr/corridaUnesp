<?php
	//Chamada para os arquivos de configuração do software.
    include "../settings/connection.php";
    include "../settings/restricted.php";
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Aferição do Tempo</title>
    <link href="../css/bootstrap.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
    <?php include "../include/favicon.php" ?>
</head>
<body class="afericao">
    <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-4">
            <div class="jumbotron">
                <div class="interna">
                    <h4>Aferição do tempo</h4>
                    <hr>
                    <p style="text-align: center;">
                    	Digite o 
                        <strong>número de peito</strong>
                        do corredor para finalizar a aferição. 
                    </p>
                    <form action="chegada.php" method="post">
                        <p>
                       		<strong>Número de Peito:</strong> 
                        	<input type="text" name="nPeito" id="" class="form-control" required>
                        </p>
                        <input type="submit" value="Finalizar Corrida" name="botao" class="btn btn-block btn-success">
                    </form>
                </div>
            </div>
            <div class="center">
                <a href="../include/menu.php" class=""> 
                	<span class="glyphicon glyphicon-chevron-left"></span>
                    Voltar para o menu de acesso
                </a>
            </div>
        </div>
        <div class="col-sm-4"></div>
    </div>
</body>
</html>
