


<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>T7-Cookies</title>
</head>

<?php

    if(isset($_COOKIE['ejercicio3'])) {
        // setcookie("ejercicio3");      //Con esto borramos la cookie
        setcookie("ejercicio3", $_COOKIE['ejercicio3']+1);
        print "<p>Su visita es esta página es la: " . $_COOKIE["ejercicio3"] . "</p><br>";
    } else {
        setcookie("ejercicio3", 1);
        print "<p>Es la primera vez que visita la página</p><br>";
    }

    print "<a href='ejercicio3.php'>Clic para hacer otra visita</a>";

    
    if(isset($_COOKIE['ejercicio3'])) {
        $resto = $_COOKIE["ejercicio3"]%5;
    }
    
    $colores = ['red','purple','yellow', 'green', 'orange'];

    print "<body style='background-color:";
    if(isset($_COOKIE['ejercicio3'])) {
        print $colores[$resto];
    }
    print ";'>";

    print "</body>";
?>
<body>
    
</body>
</html>