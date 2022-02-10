<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>T3-ExpresionesRegulares</title>
</head>
<body>
    
<?php

$fechaIntroducida = $_REQUEST['fechaIntroducida'];
$patron = "/^(0{2}|0?[1-9]|[1|2][0-9]|3[0|1])[\/-](0{2}|0?[1-9]|1[0|1|2])[\/-]([0-9]{4})$/";


function validarFecha($fechaIntroducida) {
    global $fechaIntroducida, $patron;
    if(preg_match($patron, $fechaIntroducida)) {
        return "<p>La cadena <b>'$fechaIntroducida'</b> es una fecha con el formato dd/mm/aaaa.</p>";
    } else {
        return "<p>La cadena <b>'$fechaIntroducida'</b> <span style='color:red;'>NO</span> es una fecha con el formato dd/mm/aaaa.</p>";
    }
}

print validarFecha($fechaIntroducida);

print "<br><br>";
print "<p><a href='ejercicio5.html'>Volver al formulario.</a></p>";



?>

</body>
</html>