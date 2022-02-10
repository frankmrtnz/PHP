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


$numIntroducido = $_REQUEST['numIntroducido'];
$patron = "/(\+34|34)?[6|7]+([0-9]+){8}/";


function numTelefonoEsp($numIntroducido){
    global $patron, $numIntroducido;
    print "Número de teléfono introducido: $numIntroducido <br>";
    if(preg_match($patron,$numIntroducido)) {
        return "<span style='color:green;'><b>SÍ</b></span> es de ESPAÑA";
    } else {
        return "<span style='color:red;'><b>NO</b></span> es de ESPAÑA";
    }
}

print numTelefonoEsp($numIntroducido);


print "<br><br>";
print "<p><a href='ejercicio4.html'>Volver al formulario.</a></p>";


?>


</body>
</html>