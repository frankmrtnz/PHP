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


$colores = array("Colores fuertes" => array("Rojo"=> "FF0000", "Verde"=>"00FF00", "Azul"=>"0000FF"),
                "Colores suaves" => array("Rosa"=>"FE9ABC", "Amarillo"=>"FDF189", "Malva"=>"BC8F8F"));


print "<table style='border: 1px solid #000;'";

foreach($colores as $indice => $valores) {
    print "<tr>";
    print "<td>$indice</td>";
    foreach($valores as $indice2 => $valores2) {
        print "<td style='background-color:#$valores2'>$indice2:$valores2</td>";
    }
    print "</tr>";
}

print "</table>"

?>

</body>
</html>