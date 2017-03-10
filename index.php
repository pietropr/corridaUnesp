<!doctype html>
<html>
<head>
<meta charset="utf-8">
    <title>Autenticação de Usuário</title>
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <?php include "include/favicon.php" ?>
</head>
<body>
	<center>
    	<div class="nome-software">
        	<hr>
            <h3>Software para Contabilização do Tempo de Corridas</h3>
            <p>
            	Software criado e desenvolvido pela <strong>Equipe de Desenvolvimento de Softwares RSGT</strong>.
            </p>
            <hr>
        </div>
        <div class="login panel panel-default">
            <div class="login-titulo panel-heading">
            	<h3 class="panel-title">Autenticação de Usuário</h3>
            </div>
            <div class="panel-body">
            	<div class="campos-login">
                	<form method="post" action="settings/userAuthent.php">
                    	<label class="label-campos">Usuário:</label>
                        <input type="text" class="form-control" name="login" placeholder="Login">
                        <label class="label-campos">Senha:</label>
                        <input type="password" class="form-control" name="senha" placeholder="Senha">
                        <input type="submit" class="button-acessar btn btn-default" value="Acessar"/>
                	</form>
                </div>
            </div>
        </div>
    </center>
    <script src="javaScript/jquery-1.11.3.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="javaScript/bootstrap.js" type="text/javascript" charset="utf-8"></script>
</body>
</html>