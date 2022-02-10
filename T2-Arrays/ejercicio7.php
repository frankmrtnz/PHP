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

print "<h1 style='text-align:right;'>RESPUESTA (MATRICES Y FORMULARIO BÁSICO)</h1>";

$numeroDNI = $_REQUEST['numDNI'];
$letraDNI = array('T','R','W','A','G','M','Y','F','P','D','X','B','N','J','Z','S','Q','V','H','L','C','K','E');
$restoDNI = $numeroDNI%23;

print "La letra del dni $numeroDNI es $letraDNI[$restoDNI]";


print "<p><a href='ejercicio7.html'>Volver al formulario.</a></p>";

?>

</body>
</html>