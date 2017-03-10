<?php include "../settings/restricted.php"; ?>
<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Informações da Corrida</title>
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
                <h3>Cadastro de Informações da Corrida</h3>
                <hr>
                <form action="processaCadastro.php" method="post">
                    <p>
                    	<strong>Distância da Corrida:</strong> 
                    	<input type="number" name="distancia" id="distancia" class=" form-control form-inline" required>
                    </p>
                    <p>
                    	<strong>Nome da Corrida:</strong> 
                    	<input type="text" name="nome" id="nome" class=" form-control form-inline" required>
                    </p>
                    <p>
                    	<input type="submit" value="Cadastrar" name="cadastro" class="btn btn-success btn-block">
                        <a href="../include/menu.php" name="voltar" class="btn btn-info btn-block">Voltar para o Menu</a>
                    </p>

                </form>
            </div>
        </div>
        <div class="col-sm-3"></div>
    </div>
	<script type="text/javascript" src="../javaScript/jquery-1.11.3.min.js"></script>
    <script type="text/javascript" src="../javaScript/jquery-validation-1.15.0/dist/jquery.validate.js"></script>
    <script type="text/javascript">
    jQuery(function($) {
        $(document).ready(function () {
            $("form").validate({
                rules: {
                    distancia: "required",
					nome: "required"
                },
                messages: {
                    distancia: "Digite esse campo!",
					nome: "Digite esse campo!"

                },
                errorElement: "em",
                errorPlacement: function (error, element) {
                    // Add the `help-block` class to the error element
                    error.addClass("help-block");

                    if (element.prop("type") === "checkbox") {
                        error.insertAfter(element.parent("div"));
                    } else {
                        error.insertAfter(element);
                    }
                },
                highlight: function (element, errorClass, validClass) {
                    $(element).parents(".col-sm-8").addClass("has-error").removeClass("has-success");
                },
                unhighlight: function (element, errorClass, validClass) {
                    $(element).parents(".col-sm-8").addClass("has-success").removeClass("has-error");
                }
            });
        });
    });
</script>
</body>
</html>