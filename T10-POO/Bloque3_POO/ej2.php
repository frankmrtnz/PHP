<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EJ2-POO3</title>
</head>
<body>
<?php

class Ejercicio2 {
    public static $dias = ["Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado", "Domingo"];

    function get_dias() {
        for($i=0; $i<count(Ejercicio2::$dias); $i++) {
            if($i < count(Ejercicio2::$dias)-1) {
                print Ejercicio2::$dias[$i].", ";
            } else if($i == count(Ejercicio2::$dias)-1) {
                print Ejercicio2::$dias[$i];
            }
        }
    }

    public static function obtenerFecha() {
        return date('m-d-Y');
    }

    public static function obtenerHora() {
        return date('h:i:s a');
    }

    function get_fechaYhora() {
        return Ejercicio2::obtenerFecha()." -- ".Ejercicio2::obtenerHora();
    }

}


$ej2 = new Ejercicio2();
print "<h2>Los días de la semana son: </h2>";
print "<h3>";
print $ej2->get_dias();
print "</h3>";
print "<h2>Fecha y hora a la que hemos ejecutado el script es: </h2>";
print "<h3>";
print $ej2->get_fechaYhora();
print "</h3>";


?>
</body>
</html>

