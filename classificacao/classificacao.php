<?php
//Chamada para arquivos de configurações do software.
include "../settings/connection.php";
include "../settings/restricted.php";

        /** @classificacao alunos */
            //masculino
                $alunosM = "SELECT * FROM corredores WHERE categoria = 'Aluno' AND tempo <> 0 AND sexo = 'Masculino' ORDER BY tempo ASC LIMIT 5";
                $execAlunosM = $conn -> prepare($alunosM);
                $execAlunosM -> execute();
                $countAlunosM = $execAlunosM -> rowCount();
            //feminino
            $alunosF = "SELECT * FROM corredores WHERE categoria = 'Aluno' AND tempo <> 0 AND sexo = 'Feminino' ORDER BY tempo ASC LIMIT 5";
            $execAlunosF = $conn -> prepare($alunosF);
            $execAlunosF -> execute();
            $countAlunosF = $execAlunosF -> rowCount();
        /** @final  */
        
        
        
        /** @classificacao docentes */
            //masculino
                $docentesM = "SELECT * FROM corredores WHERE categoria = 'Docente' AND tempo <> 0 AND sexo = 'Masculino' ORDER BY tempo ASC LIMIT 5";
                $execDocenteM = $conn -> prepare($docentesM);
                $execDocenteM -> execute();
                $countDocenteM = $execDocenteM -> rowCount();
            //feminino
                $docentesF = "SELECT * FROM corredores WHERE categoria = 'Docente' AND tempo <> 0 AND sexo = 'Feminino' ORDER BY tempo ASC LIMIT 5";
                $execDocenteF = $conn -> prepare($docentesF);
                $execDocenteF -> execute();
                $countDocenteF = $execDocenteF -> rowCount();
        /** @final */
        
        
        /** @classificacao funcionarios */
            //masculino
                $funcionariosM = "SELECT * FROM corredores WHERE categoria = 'Funcionário' AND tempo <> 0 AND sexo = 'Masculino' ORDER BY tempo ASC LIMIT 5";
                $execFuncM = $conn -> prepare($funcionariosM);
                $execFuncM -> execute();
                $countFuncM = $execFuncM -> rowCount();
            //feminino
                $funcionariosF = "SELECT * FROM corredores WHERE categoria = 'Funcionário' AND tempo <> 0 AND sexo = 'Feminino' ORDER BY tempo ASC LIMIT 5";
                $execFuncF = $conn -> prepare($funcionariosF);
                $execFuncF -> execute();
                $countFuncF = $execFuncF -> rowCount();
        /** @final */
?>
<!doctype html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Classificação Final</title>
    <link href="../css/bootstrap.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
    <?php include "../include/favicon.php" ?>
</head>
<body>
<hr>
<h2 style="color: #337ab7; text-align: center;">Classificação Final</h2>
<hr>
<div class="col-sm-8 col-sm-offset-2">
    <?php
    //Condição para exibição de alunos MASCULINO.
    if($countAlunosM > 0){
        ?>
        <h3 style="text-align:center">Alunos</h3>
        <hr>
        <h5 style="text-align:center">Masculino</h5>
        <table class="table table-bordered" style="text-align: center;">
            <tr class="active">
                <td><strong>Posição</strong></td>
                <td><strong>Nº Peito</strong></td>
                <td><strong>Nome</strong></td>
                <td><strong>Tempo</strong></td>
                <td><strong>PACE (Min/KM)</strong></td>
                <td><strong>Categoria</strong></td>
                <td><strong>Sexo</strong></td>
            </tr>
            <?php $i = 1;
            while ($fetchAlunoM = $execAlunosM->fetch(PDO::FETCH_ASSOC)) { ?>

                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $fetchAlunoM['IDcorredores'] ?></td>
                    <td style="text-align: left;"><?php echo $fetchAlunoM['nome'] ?></td>
                    <td><?php echo $fetchAlunoM['tempo'] ?></td>
                    <td><?php echo $fetchAlunoM['pace'] ?></td>
                    <td><?php echo $fetchAlunoM['categoria'] ?></td>
                    <td><?php echo $fetchAlunoM['sexo'] ?></td>
                </tr>
                <?php
                $i++;
            }
            ?>
        </table>

        <?php
    }
    //Condição para exibição de alunos FEMININO.
    if($countAlunosF > 0){
        ?>
        <h3 style="text-align:center">Alunos</h3>
        <hr>
        <h5 style="text-align:center">Feminino</h5>
        <table class="table table-bordered" style="text-align: center;">
            <tr class="active">
                <td><strong>Posição</strong></td>
                <td><strong>Nº Peito</strong></td>
                <td><strong>Nome</strong></td>
                <td><strong>Tempo</strong></td>
                <td><strong>PACE (Min/KM)</strong></td>
                <td><strong>Categoria</strong></td>
                <td><strong>Sexo</strong></td>
            </tr>
            <?php $i = 1; while ($fetchAlunoF = $execAlunosF -> fetch(PDO::FETCH_ASSOC)) { ?>

                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $fetchAlunoF['IDcorredores'] ?></td>
                    <td style="text-align: left;"><?php echo $fetchAlunoF['nome'] ?></td>
                    <td><?php echo $fetchAlunoF['tempo'] ?></td>
                    <td><?php echo $fetchAlunoF['pace'] ?></td>
                    <td><?php echo $fetchAlunoF['categoria'] ?></td>
                    <td><?php echo $fetchAlunoF['sexo'] ?></td>
                </tr>
                <?php
                $i++;
            } ?>

        </table>

        <?php
    }

    //Condição para exibição dos docente MASCULINO.
    if($countDocenteM > 0){
        ?>
        <h3 style="text-align:center">Docentes</h3>
        <hr>
        <h5 style="text-align:center">Masculino</h5>
        <table class="table table-bordered" style="text-align: center;">
            <tr class="active">
                <td><strong>Posição</strong></td>
                <td><strong>Nº Peito</strong></td>
                <td><strong>Nome</strong></td>
                <td><strong>Tempo</strong></td>
                <td><strong>PACE (Min/KM)</strong></td>
                <td><strong>Categoria</strong></td>
                <td><strong>Sexo</strong></td>
            </tr>
            <?php $i = 1; while ($fetchDocenteM = $execDocenteM -> fetch(PDO::FETCH_ASSOC)) { ?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $fetchDocenteM['IDcorredores'] ?></td>
                    <td style="text-align: left;"><?php echo $fetchDocenteM['nome'] ?></td>
                    <td><?php echo $fetchDocenteM['tempo'] ?></td>
                    <td><?php echo $fetchDocenteM['pace'] ?></td>
                    <td><?php echo $fetchDocenteM['categoria'] ?></td>
                    <td><?php echo $fetchDocenteM['sexo'] ?></td>
                </tr>
                <?php
                $i++;
            } ?>
        </table>
    <?php } ?>

    <?php
    //Condição para exibição dos docente MASCULINO.
    if($countDocenteF > 0){
        ?>
        <h3 style="text-align:center">Docentes</h3>
        <hr>
        <h5 style="text-align:center">Feminino</h5>
        <table class="table table-bordered" style="text-align: center;">
            <tr class="active">
                <td><strong>Posição</strong></td>
                <td><strong>Nº Peito</strong></td>
                <td><strong>Nome</strong></td>
                <td><strong>Tempo</strong></td>
                <td><strong>PACE (Min/KM)</strong></td>
                <td><strong>Categoria</strong></td>
                <td><strong>Sexo</strong></td>
            </tr>
            <?php $i = 1; while ($fetchDocenteF = $execDocenteF -> fetch(PDO::FETCH_ASSOC)) { ?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $fetchDocenteF['IDcorredores'] ?></td>
                    <td style="text-align: left;"><?php echo $fetchDocenteF['nome'] ?></td>
                    <td><?php echo $fetchDocenteF['tempo'] ?></td>
                    <td><?php echo $fetchDocenteF['pace'] ?></td>
                    <td><?php echo $fetchDocenteF['categoria'] ?></td>
                    <td><?php echo $fetchDocenteF['sexo'] ?></td>
                </tr>
                <?php
                $i++;
            } ?>
        </table>
        <?php
    }?>
    <?
    //Condição para exibição dos funcionários MASCULINO.
    if($countFuncM > 0){
        ?>
        <h3 style="text-align: center">Funcionários</h3>
        <hr>
        <h5 style="text-align:center">Masculino</h5>
        <table class="table table-bordered">
            <tr class="active">
                <td><strong>Posição</strong></td>
                <td><strong>Nº Peito</strong></td>
                <td><strong>Nome</strong></td>
                <td><strong>Tempo</strong></td>
                <td><strong>PACE (Min/KM)</strong></td>
                <td><strong>Categoria</strong></td>
                <td><strong>Sexo</strong></td>
            </tr>
            <?php
            $i = 1;

            while ($fetchFuncM = $execFuncM -> fetch(PDO::FETCH_ASSOC)) {
                ?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $fetchFuncM['IDcorredores'] ?></td>
                    <td style="text-align: left;"><?php echo $fetchFuncM['nome'] ?></td>
                    <td><?php echo $fetchFuncM['tempo'] ?></td>
                    <td><?php echo $fetchFuncM['pace'] ?></td>
                    <td><?php echo $fetchFuncM['categoria'] ?></td>
                    <td><?php echo $fetchFuncM['sexo'] ?></td>
                </tr>
                <?php
                $i++;
            }
            ?>
        </table>
    <?php } ?>


    <?
    //Condição para exibição dos funcionários MASCULINO.
    if($countFuncF > 0){
        ?>
        <h3 style="text-align: center">Funcionários</h3>
        <hr>
        <h5 style="text-align:center">Feminino</h5>
        <table class="table table-bordered">
            <tr class="active">
                <td><strong>Posição</strong></td>
                <td><strong>Nº Peito</strong></td>
                <td><strong>Nome</strong></td>
                <td><strong>Tempo</strong></td>
                <td><strong>PACE (Min/KM)</strong></td>
                <td><strong>Categoria</strong></td>
                <td><strong>Sexo</strong></td>
            </tr>
            <?php
            $i = 1;

            while ($fetchFuncF = $execFuncF -> fetch(PDO::FETCH_ASSOC)) {
                ?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $fetchFuncF['IDcorredores'] ?></td>
                    <td style="text-align: left;"><?php echo $fetchFuncF['nome'] ?></td>
                    <td><?php echo $fetchFuncF['tempo'] ?></td>
                    <td><?php echo $fetchFuncF['pace'] ?></td>
                    <td><?php echo $fetchFuncF['categoria'] ?></td>
                    <td><?php echo $fetchFuncF['sexo'] ?></td>
                </tr>
                <?php
                $i++;
            }
            ?>
        </table>
    <?php } ?>


    <div style="width: 300px; margin: 30px auto !important;">
        <a href="../settings/excel.php" class="btn btn-success btn-block">Gerar Excel</a>
    </div>

    <div class="center" style="margin: 30px auto !important; text-align: center;">
        <a href="../include/menu.php" class="">
            <span class="glyphicon glyphicon-chevron-left"></span>
            Voltar para o menu de acesso
        </a>
    </div>

</div>

</body>
</html>