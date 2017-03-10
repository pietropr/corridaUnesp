<?

    include "connection.php";

    /**
     *  Recupera os valores dos corredores do banco
     */
        $sFunc   = "SELECT * FROM corredores WHERE situacao = 1 ORDER BY IDcorredores ASC";
        $exeFunc = $conn -> prepare($sFunc);
        $exeFunc -> execute();

//        $sDoc   = "SELECT * FROM corredores WHERE situacao = 1 AND categoria = 'Docente' ORDER BY tempo ASC";
//        $exeDoc = $conn -> prepare($sDoc);
//        $exeDoc -> execute();
//
//        $sAluno   = "SELECT * FROM corredores WHERE situacao = 1 AND categoria = 'Aluno' ORDER BY tempo ASC";
//        $exeAluno = $conn -> prepare($sAluno);
//        $exeAluno -> execute();
//
        $countFunc  = $exeFunc -> rowCount();
//        $countDoc   = $exeDoc -> rowCount();
//        $countAlun  = $exeAluno -> rowCount();





    $html[0] = "
                <table border=1>
                    <tr>
                        <td style='background: #0093DD !important;'>N Peito  &nbsp; </td>
                        <td style='background: #0093DD !important;'>Nome  &nbsp; </td>
                        <td style='background: #0093DD !important;'>Categoria &nbsp; </td>
                        <td style='background: #0093DD !important;'>Tempo &nbsp; </td>
                        <td style='background: #0093DD !important;'>PACE (min/Km) &nbsp; </td>
                    </tr>
                 </table>";

    $i = 1;
    $j = 1;
    while ($fUsuarioF = $exeFunc -> fetch(PDO::FETCH_ASSOC)) {
        if ($fUsuarioF['tempo'] != NULL) {
            $html[$i] .= "<table border='1'>";
            $html[$i] .= "<tr>";
            $html[$i] .= "<td>$fUsuarioF[IDcorredores]</td>";
            $html[$i] .= "<td>$fUsuarioF[nome]</td>";
            $html[$i] .= "<td>$fUsuarioF[categoria]</td>";
            $html[$i] .= "<td>$fUsuarioF[tempo]</td>";
            $html[$i] .= "<td>$fUsuarioF[pace]</td>";
            $html[$i] .= "</tr>";
            $html[$i] .= "</table>";

            $j++;

        }


    }





    $arquivo = 'corridaunesp.xls';
    header ("Expires: Sun, 30 Nov 2017 05:00:00 GMT");
    header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
    header ("Cache-Control: no-cache, must-revalidate");
    header ("Pragma: no-cache");
    header ("Content-type: application/x-msexcel");
    header ("Content-Disposition: attachment; filename={$arquivo}" );
    header ("Content-Description: PHP Generated Data" );



    for ($i = 0; $i <= $countFunc; $i++) {
        echo $html[$i];
    }