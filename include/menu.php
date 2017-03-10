<?php 
	//Chamada para os arquivos de configuração do software.
	include "../settings/restricted.php"; 
	include "../settings/connection.php";
	
	//Instrução SQL para seleção de corredores.
    $sql = "SELECT count(IDcorredores), largada FROM corredores WHERE situacao = 1; ";
    $execSql = $conn -> query($sql);
    $fetch = $execSql -> fetch(PDO::PARAM_STR);
	
	//Instrução SQL para seleção de informações da corrida.
    $sqlCorrida = "SELECT count(idCorrida), nomeCorrida, distanciaCorrida FROM corrida WHERE situacao = 1; ";
    $execSqlInfo = $conn -> query($sqlCorrida);
    $fetchInfo = $execSqlInfo -> fetch(PDO::PARAM_STR);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
    <title>Menu de Acesso</title>
    <link href="../css/bootstrap.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
    <?php include "favicon.php" ?>
</head>
<body class="menu">
	<center>
        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-6">
            	<?php
					//Armazena o valor em uma variável.
					$contadorCorrida = $fetchInfo['count(idCorrida)'];
					
					//Caso exista registro.
					if($contadorCorrida == 1){
					?>
                    	<p>
                            <h3 style="text-align: center; color: #337ab7; margin-top: -15px;">
                                <? echo $fetchInfo['nomeCorrida'] ?>
                           	</h3>
                        </p>
                    	<div class="info-corrida">
                            <p><strong>Distância:</strong> <? echo $fetchInfo['distanciaCorrida'] ?> KM</p>
                            <p>
                            	<strong>Largada Iniciada:</strong>
                                <?php
									//Verifica se a largada foi iniciada.
									if($fetch['largada'] != NULL && $fetch['count(IDcorredores)'] > 0){
										echo "Sim";
									}else{
										echo "Não";
									}
								?>
                            </p>
                        </div>
                    <?php
					}else{
					?>
                    	<center>
                        	<div class="alert alert-danger">
                            	<strong>Atenção: </strong>Você ainda não cadastrou as informações sobre a corrida!
                                <br>
                                <p>Sem as informações o software não irá gerar o resultado esperado.</p>
                                <p>
                                	Utilize o botão <strong>Informações Corrida</strong> para executar
                                    a operação.
                                </p>
                            </div>
                        </center>
                    <?php
					}
				?>
              <div class="jumbotron">
                    <div>
                        <div class="botoes">
                            <a href="../corredores/cadastro.php" class="thumbnail">
                                <span class="glyphicon glyphicon-plus-sign"></span>
                                Cadastro de Corredor
                            </a>
                            <a href="../corredores/listaCorredores.php" class="thumbnail">
                                <span class="glyphicon glyphicon-heart"></span>
                                Corredores 
                                <span class="badge"><? echo $fetch['count(IDcorredores)'] ?></span>
                            </a>
                            <a href="../corrida/cadastro.php" class="thumbnail">
                                <span class="glyphicon glyphicon-road"></span>
                                Informações da Corrida
                          </a>
                            <a href="../tempo/afericao.php" class="thumbnail">
                                <span class="glyphicon glyphicon-time"></span>
                                Aferição do Tempo
                            </a>
                            <a href="../classificacao/classificacao.php" class="thumbnail">
                                <span class="glyphicon glyphicon-align-left"></span>
                                Classificação
                            </a>
                            <a href="../publica/tempoReal.php?off=0" class="thumbnail">
                                <span class="glyphicon glyphicon-heart"></span>
                                Chegada em Tempo Real
                            </a>
                            <a href="../tempo/largada.php" class="but-largada btn btn-danger" 
                               onClick="this.disabled = 'true'">
                                <span class="glyphicon glyphicon-play"></span>
                                Disparar Largada
                            </a>
                            <a href="../settings/exit.php" class="btn btn-danger" >
                                <span class="glyphicon glyphicon-time"></span>
                                Sair do Software
                            </a>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-sm-3"></div>
        </div>

    </center>
    <script src="../javaScript/jquery-1.11.3.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="../javaScript/bootstrap.js" type="text/javascript" charset="utf-8"></script>
</body>
</html>