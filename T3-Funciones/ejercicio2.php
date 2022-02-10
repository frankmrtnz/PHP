<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>T3-Funciones</title>
</head>
<body>
    
<?php

print "<h1 style='text-align:center;'>Ej2-Texto en negrita (Respuesta)</h1>";

$textoIntroducido = $_REQUEST['textoIntroducido'];

function textoNegrita($x){
    return "<b>$x</b>";
}

$resultadoTexto = textoNegrita($textoIntroducido);

print $resultadoTexto;


print "<br>";
print "<p><a href='ejercicio2.html'>Volver al formulario.</a></p>";

?>

</body>
</html>