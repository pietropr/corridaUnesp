<!DOCTYPE html>
<html>
<?php
	ob_start();
	session_start();
	
	if(!isset($_SESSION['usuarioSession'])):
?>
<head>
    <title>Acesso Restrito</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="../css/style.css" rel="stylesheet" type="text/css">
</head>
<body>
    <center>
        <div class="panel-restrito panel panel-danger">
            <div class="panel-heading">
                <h3 class="panel-title">Acesso restrito!</h3>
            </div>
            <div class="panel-body">
                <p>Você não tem permissão para acessar está página.</p>
                <hr />
                    <a class="btn btn-default" href="../index.php">Página de autenticação</a>
                <hr />
                <p>A página será carregada automáticamente em 5 segundos...</p>
            </div>
        </div>
    </center>
</body>
<?php
	echo("<meta HTTP-EQUIV='refresh' CONTENT='5;URL=../index.php'>");
	die;
	endif;
?>
</html>
