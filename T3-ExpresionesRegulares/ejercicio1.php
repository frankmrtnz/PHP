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

print "<h1 style='text-align:rigth;'>VALIDACIÓN ENTRADA DE TEXTO 1 (Resultado)</h1>";

$cadena = $_REQUEST['textoIntroducido'];

$patron1 = "";
$patron2 = "/^[A-Z]+$/i";   //el 'i' acepta mayusculas y minusculas
$patron3 = "/^[[:alpha:]]+ +[[:alpha:]]+$/s";      //el 's' acepta espacios
$patron4 = "/^[[:alpha:]]+$/";
$patron5 = "/^[a]*[e]*[i]*[o]*[u]*$/";
$patron6 = "/^[0-9]+$/";
$patron7 = "/^[0-9]*[02468]$/";
$patron8 = "/^[6|9][0-9]{8}$/";
$patron9 = "/^[0-9]{8}[A-Z]$/i";
$patron10 = "/^[0-4][0-9]{4}$/";


print "<ol>";

//Ejercicio1
print "<li>";
if($cadena == $patron1) {
    print "<p>La cadena <b>'$cadena'</b> está vacía.</p>";
} else {
    print "<p>La cadena <b>'$cadena'</b> <span style='color:red;'>NO</span> está vacía.</p>";
}
print "</li>";

//Ejercicio2
print "<li>";
if(preg_match($patron2, $cadena)) {
    print "<p>La cadena <b>'$cadena'</b> es una única palabra.</p>";
} else {
    print "<p>La cadena <b>'$cadena'</b> <span style='color:red;'>NO</span> es una única palabra.</p>";
}
print "</li>";

//Ejercicio3
print "<li>";
if(preg_match($patron3, $cadena)) {
    print "<p>La cadena <b>'$cadena'</b> son dos palabras.</p>";
} else {
    print "<p>La cadena <b>'$cadena'</b> <span style='color:red;'>NO</span> son dos palabras.</p>";
}
print "</li>";

//Ejercicio4
print "<li>";
if(preg_match($patron4, $cadena)) {
    print "<p>La cadena <b>'$cadena'</b> es una única palabra que contiene solamente caracteres ingleses.</p>";
} else {
    print "<p>La cadena <b>'$cadena'</b> <span style='color:red;'>NO</span> es una única palabra que contiene solamente caracteres ingleses.</p>";
}
print "</li>";


//Ejercicio5
print "<li>";
if(preg_match($patron5, $cadena)) {
    print "<p>La cadena <b>'$cadena'</b> es una cadena de vocales minúsculas sin acentuar en orden alfabético.</p>";
} else {
    print "<p>La cadena <b>'$cadena'</b> <span style='color:red;'>NO</span> es una cadena de vocales minúsculas sin acentuar en orden alfabético.</p>";
}
print "</li>";


//Ejercicio6
print "<li>";
if(preg_match($patron6, $cadena)) {
    print "<p>La cadena <b>'$cadena'</b> es único número.</p>";
} else {
    print "<p>La cadena <b>'$cadena'</b> <span style='color:red;'>NO</span> es único número.</p>";
}
print "</li>";


//Ejercicio7
print "<li>";
if(preg_match($patron7, $cadena)) {
    print "<p>La cadena <b>'$cadena'</b> es número par.</p>";
} else {
    print "<p>La cadena <b>'$cadena'</b> <span style='color:red;'>NO</span> es número par.</p>";
}
print "</li>";


//Ejercicio8
print "<li>";
if(preg_match($patron8, $cadena)) {
    print "<p>La cadena <b>'$cadena'</b> es un número de teléfono.</p>";
} else {
    print "<p>La cadena <b>'$cadena'</b> <span style='color:red;'>NO</span> es un número de teléfono.</p>";
}
print "</li>";


//Ejercicio9
print "<li>";
if(preg_match($patron9, $cadena)) {
    print "<p>La cadena <b>'$cadena'</b> es un DNI válido.</p>";
} else {
    print "<p>La cadena <b>'$cadena'</b> <span style='color:red;'>NO</span> es un DNI válido.</p>";
}
print "</li>";


//Ejercicio10
print "<li>";
if(preg_match($patron10, $cadena)) {
    print "<p>La cadena <b>'$cadena'</b> es un código postal válido.</p>";
} else {
    print "<p>La cadena <b>'$cadena'</b> <span style='color:red;'>NO</span> es un código postal válido.</p>";
}
print "</li>";


print "</ol>";



print "<br><br>";
print "<p><a href='ejercicio1.html'>Volver al formulario.</a></p>";


?>


</body>
</html>