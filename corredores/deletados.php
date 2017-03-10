<?php
	//Chamada para os arquivos de configurações do software.
	include "../settings/connection.php";
	include "../settings/restricted.php";
	
	//Instrução SQL de busca dos corredores que foram deletados.
	$consultaCorredores = "SELECT * FROM corredores WHERE situacao = 0 ";
	$executaCorredores = $conn -> prepare($consultaCorredores);
	$executaCorredores -> execute();
	
	//Contagem dos corredores deletados.
	$count = $executaCorredores -> rowCount();
?>
<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Corredores Deletados</title>
    <link href="../css/bootstrap.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
    <?php include "../include/favicon.php" ?>
</head>
<body class="lista">
    <div class="row">
        <div class="col-sm-2"></div>
        <div class="col-sm-8">
            <center>
                <?php
                    //Programação do botão ADICIONAR.
                    if (isset($_POST['adicionar'])) {
                        $IDcorredores = $_POST['IDcorredor'];
                        $selectEx = "UPDATE corredores SET situacao = 1 WHERE IDcorredores = :nPeito";
                        $execEx = $conn -> prepare($selectEx);
                        $execEx -> bindValue(':nPeito', $IDcorredores, PDO::PARAM_STR);
                        $execEx -> execute();
               ?>
    
                    <div class="alert alert-success" style="margin-top: 50px;">
                        Você adicionou o corredor com ID: <?php echo $IDcorredores;?>. 
                        A página será recarregada automáticamente.
                    </div>
                    <meta HTTP-EQUIV='refresh' CONTENT='3;URL=listaCorredores.php'>
                <?php } ?>
            </center>
                <?php
                    //Verifica se existe corredores excluídos.
                    if ($count > 0) { ?>
                        <div class="scroll">
                            <table class="table table-bordered">
                                <tr class="active">
                                    <td>Nº de Peito</td>
                                    <td>Nome</td>
                                    <td>Categoria</td>
                                    <td>Sexo</td>
                                    <td>Adicionar</td>
                                </tr>
                        <?php
                            //Laço de exibição dos corredores excluídos.
                            while ($fetch = $executaCorredores -> fetch(PDO::FETCH_ASSOC)) { ?>
                            <tr>
                                <td><?php echo $fetch['IDcorredores']?></td>
                                <td><?php echo $fetch['nome']?></td>
                                <td><?php echo $fetch['categoria']?></td>
                                <td><?php echo $fetch['sexo']?></td>
                                <td>
                                    <form action="" method="post"> <input type="submit" name="adicionar" 
                                          class="btn btn-success btn-sm btn-block" value="Adicionar">
                                        <input type="hidden" name="IDcorredor" value="<?php echo $fetch['IDcorredores'] ?>">
                                    </form>
                                </td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>
            <?php 
                }else{
             ?> 
             <h2 align="center" style="margin-top: 50px;">Não há nenhum corredor excluído!</h2> 
             <?php } ?>
             <hr>
            <div class="center">
                <a href="listaCorredores.php" class=""> 
                    <span class="glyphicon glyphicon-chevron-left"></span>
                    Voltar para a lista de corredores cadastrados
                </a>
            </div>
        </div>
        <div class="col-sm-2"></div>
    </div>
</body>
</html>
