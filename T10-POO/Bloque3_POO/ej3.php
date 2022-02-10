<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EJ3-POO3</title>
</head>
<body>
<?php


class Jugador{
    var $nombre_jugador;
    var $equipo;

    //Funcion __call que recoge el nombre sobrecargado
    function __call($metodo, $argumentos) {
        if ($metodo = 'set_jugador'){
            if (count($argumentos) == 0){
                $this->nombre_jugador = "anónimo";
                $this->equipo = "";
            }
            if (count($argumentos) == 1){ 
                $this->nombre_jugador = $argumentos[0];
                $this->equipo = "Sin equipo";
            }
            if (count($argumentos) == 2){
                $this->nombre_jugador = $argumentos[0];
                $this->equipo = $argumentos[1];
            }
        }
    }

    
    //Convertir objeto en cadena
    public function __toString(){
        return $this->nombre_jugador.'-'.$this->equipo;
    }

    
}


$jugador1 = new Jugador();
$jugador1->set_jugador();

$jugador2 = new Jugador();
$jugador2->set_jugador("Juan");

$jugador3 = new Jugador();
$jugador3->set_jugador("Juan","Real Madrid");
print "<h2>método sobre-cargado el constructor</h2>";
print "<ol>";
print "<li><h3>Sin pasar nada al constructor y poniendo anónimo por defecto:</h3>
            $jugador1
        </li>";
print "<li><h3>Pasando solo un parámetro y el valor sin equipo por defecto:</h3>
            $jugador2
        </li>";
print "<li><h3>Pasándole los dos parámetros:</h3>
            $jugador3
        </li>";
print "</ol>";


?>
</body>
</html>

