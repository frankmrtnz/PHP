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

$cadena1 = "juanang@alpex.com";
$cadena2 = "juan.ang@al.pex.com";
$cadena3 = "JUANANG@pex.com.es";

$patron = "/^[a-z]+[\.]?[a-z]*[\@][a-z]+[\.]?[a-z]*[\.]?[a-z]*/i";


function comprobarEmail($email, $patron) {
    global $patron;
    print "Email introducido: <b>$email</b>";
    print "<br>";
    if(preg_match($patron,$email)) {
        return "<i>EMAIL COMPROBADO Y VÁLIDO</i>";
    } else {
        return "<i>EMAIL NO COMPROBADO Y NO VÁLIDO</i>";
    }
}

print comprobarEmail($cadena1,$patron);
print "<br>";
print comprobarEmail($cadena2,$patron);
print "<br>";
print comprobarEmail($cadena3,$patron);


?>


</body>
</html>