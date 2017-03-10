<?php
	//Chamada para os arquivos de configuração do software.
    include "../settings/connection.php";
    include "../settings/restricted.php";

	//Instruções SQL de seleção dos corredores.
    $consultaCorredores = "SELECT * FROM corredores WHERE situacao = 1 ";
    $executaCorredores = $conn -> prepare($consultaCorredores);
    $executaCorredores -> execute();

	//Contagem da quantidade de corredores na base de dados.
    $count = $executaCorredores -> rowCount();
?>
<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Corredores</title>
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
                    //Programação do botão EXCLUIR.
                    if (isset($_POST['excluir'])) {
                        $IDcorredores = $_POST['IDcorredor'];
                        $selectEx = "UPDATE corredores SET situacao = 0 WHERE IDcorredores = :nPeito";
                        $execEx = $conn -> prepare($selectEx);
                        $execEx -> bindValue(':nPeito', $IDcorredores, PDO::PARAM_STR);
                        $execEx -> execute();
                ?>
                <div class="alert alert-danger" style="margin-top: 50px;">Você excluiu o corredor com ID: 
                    <?php echo $IDcorredores;?>.
                    Para visualiza-lo novamente, clique no item "Exibir Corredores Deletados"!
                </div>
                <meta HTTP-EQUIV='refresh' CONTENT='3;URL=listaCorredores.php'>
                <?php } ?>
            </center>
                <?php 
                    //Caso exista corredor, exibe a lista.
                    if ($count > 0) { 
                ?>
    
            <div class="scroll">
                <table class="table table-bordered" style="text-align: center;">
                    <tr class="active">
                        <td><strong>Nº de Peito</strong></td>
                        <td><strong>Nome</strong></td>
                        <td><strong>Categoria</strong></td>
                        <td><strong>Sexo</strong></td>
                        <td><strong>Alterar</strong></td>
                        <td><strong>Excluir</strong></td>
                    </tr>
                    <?php
                    //Laço de exibição dos corredores.
                    while ($fetch = $executaCorredores -> fetch(PDO::FETCH_ASSOC)) { ?>
                        <tr>
                            <td><?php echo $fetch['IDcorredores']?></td>
                            <td><?php echo $fetch['nome']?></td>
                            <td><?php echo $fetch['categoria']?></td>
                            <td><?php echo $fetch['sexo']?></td>
                            <td>
                                <a href="altCorredor.php?id=<? echo $fetch['IDcorredores'] ?>" 
                                   class="btn btn-warning btn-sm btn-block">Alterar</a>
                            </td>
                            <td>
                                <form action="" method="post">
                                    <input type="submit" name="excluir" class="btn btn-danger btn-sm btn-block" 
                                           value="Excluir">
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
             <h2 align="center" style="margin-top: 50px;">Não há nenhum corredor cadastrado!</h2>
             <?php } ?>
            <hr>
            <div class="deletados">
                <h4>Clique no botão abaixo para exibir os corredores deletados</h4>
                <a href="deletados.php" class="btn btn-default btn-block">Exibir Corredores Deletados</a>
            </div>
            <hr>
            <div class="center">
                <a href="../include/menu.php"> 
                    <span class="glyphicon glyphicon-chevron-left"></span>
                    Voltar para o menu de acesso
                </a>
            </div>
        </div>
        <div class="col-sm-2"></div>
    </div>
</body>
</html>
