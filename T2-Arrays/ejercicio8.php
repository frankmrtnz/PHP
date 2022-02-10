<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>T2-Arrays1</title>
</head>
<body>
    
<?php

$pais = array("España" => array("Castellano","Peseta"), 
        "Italia" => array("Italiano","Lira"),
        "Francia" => array("Francés","Franco"),
        "Reino Unido" => array("Inglés","Libra"),
        "Alemania" => array("Alemán","Marco")
        );


print "<table border='1px solid black;' style='background-color:lightblue; text-align:center; margin-left:22.5%;'>
        <tr>
            <td colspan=3 style='padding: 5px 80px;'><b>PAÍSES, MONEDAS E IDIOMA OFICIAL</b></td>
        </tr>
        <tr>
            <td style='padding: 5px 80px;'><b>Nombre</b></td>
            <td style='padding: 5px 80px;'><b>Lengua</b></td>
            <td style='padding: 5px 80px;'><b>Moneda</b></td>
        </tr>";

foreach ($pais as $indice => $valor) {
    print   "<tr>
                <td style='padding: 5px 80px;'>$indice</td>
                <td style='padding: 5px 80px;'>$valor[0]</td>
                <td style='padding: 5px 80px;'>$valor[1]</td>
            </tr>";
}

print "</table>";



?>

</body>
</html>