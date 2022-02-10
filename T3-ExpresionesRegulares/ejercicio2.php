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

print "<h1 style='text-align:rigth;'>VALIDACIÓN ENTRADA DE TEXTO 2 (Resultado)</h1>";

$cadena = $_REQUEST['textoIntroducido'];

$patron1 = "/^[[:alpha:]]( +[[:alpha:]])*$/";
$patron2 = "/^[[:alpha:]]( +[[:alpha:]])+$/";
$patron3 = "/^[a-z]+( +[a-z]+)*$/";
$patron4 = "/^[[:upper:]]+$/";
$patron5 = "/^(0{2}|0?[1-9]|[1|2][0-9]|3[0|1])[\/-](0{2}|0?[1-9]|1[0|1|2])[\/-]([0-9]{4})$/";
$patron6 = "/^([0-9]+|[0-9]+[.|,]?[0-9]{2})$/";
$patron7 = "/^([\+|\-][0-9]+([\.|\,]?[0-9])*)$/";  
$patron8 = "/^[[:alnum:]\+\.\*\_\-]{6,}$/S";   




print "<ol>";

//Ejercicio1
print "<li>";
if(preg_match($patron1, $cadena)) {
    print "<p>La cadena <b>'$cadena'</b> es uno o más caracteres sueltos separados por espacios.</p>";
} else {
    print "<p>La cadena <b>'$cadena'</b> <span style='color:red;'>NO</span> es uno o más caracteres sueltos separados por espacios.</p>";
}
print "</li>";


//Ejercicio2
print "<li>";
if(preg_match($patron2, $cadena)) {
    print "<p>La cadena <b>'$cadena'</b> es dos o más caracteres sueltos separados por espacios.</p>";
} else {
    print "<p>La cadena <b>'$cadena'</b> <span style='color:red;'>NO</span> es dos o más caracteres sueltos separados por espacios.</p>";
}
print "</li>";


//Ejercicio3
print "<li>";
if(preg_match($patron3, $cadena)) {
    print "<p>La cadena <b>'$cadena'</b> es una o más palabras con caracteres ingleses.</p>";
} else {
    print "<p>La cadena <b>'$cadena'</b> <span style='color:red;'>NO</span> es una o más palabras con caracteres ingleses.</p>";
}
print "</li>";



//Ejercicio4
print "<li>";
if(preg_match($patron4, $cadena)) {
    print "<p>La cadena <b>'$cadena'</b> es una única palabra en mayúsculas.</p>";
} else {
    print "<p>La cadena <b>'$cadena'</b> <span style='color:red;'>NO</span> es una única palabra en mayúsculas.</p>";
}
print "</li>";


//Ejercicio5
print "<li>";
if(preg_match($patron5, $cadena)) {
    print "<p>La cadena <b>'$cadena'</b> es una fecha con el formato dd/mm/aaaa.</p>";
} else {
    print "<p>La cadena <b>'$cadena'</b> <span style='color:red;'>NO</span> es una fecha con el formato dd/mm/aaaa.</p>";
}
print "</li>";


//Ejercicio6
print "<li>";
if(preg_match($patron6, $cadena)) {
    print "<p>La cadena <b>'$cadena'</b> es un número sin signo y puede que hasta dos decimales.</p>";
} else {
    print "<p>La cadena <b>'$cadena'</b> <span style='color:red;'>NO</span> es un número sin signo y puede que hasta dos decimales.</p>";
}
print "</li>";


//Ejercicio7
print "<li>";
if(preg_match($patron7, $cadena)) {
    print "<p>La cadena <b>'$cadena'</b> es un número con signo y puede que hasta con parte decimal.</p>";
} else {
    print "<p>La cadena <b>'$cadena'</b> <span style='color:red;'>NO</span> es un número con signo y puede que hasta con parte decimal.</p>";
}
print "</li>";



//Ejercicio8
print "<li>";
if(preg_match($patron8, $cadena)) {
    print "<p>La cadena <b>'$cadena'</b> es una contraseña válida.</p>";
} else {
    print "<p>La cadena <b>'$cadena'</b> <span style='color:red;'>NO</span> es una contraseña válida.</p>";
}
print "</li>";



print "<ol>";


print "<br><br>";
print "<p><a href='ejercicio2.html'>Volver al formulario.</a></p>";


?>


</body>
</html>