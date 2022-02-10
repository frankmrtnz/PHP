<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EJ1-POO3</title>
</head>
<body>
<?php


class Racional {
    var $numerador;
    var $denominador;

    //Funcion __call que recoge el nombre sobrecargado
    function __call($metodo, $argumentos) {
        if ($metodo = 'set_numeros'){
            if (count($argumentos) == 0){
                $this->numerador = 1;
                $this->denominador = 1;
            }
            if (count($argumentos) == 1){ 
                $this->numerador = $argumentos[0];
                $this->denominador = 1;
            }
            if (count($argumentos) == 2){
                $this->numerador = $argumentos[0];
                $this->denominador = $argumentos[1];
            }
        }
        if ($metodo = 'set_fraccion'){
            if (count($argumentos) == 1){ 
                $this->numerador = $argumentos[0];
            }  
        }
    
    }

    //Aquí comienzan los getters y setters de las propiedades.
    function get_numerador() { 
        return $this->numerador; 
    }
    function get_denominador() {
        return $this->denominador; 
    }

}

$r1 = new Racional();     /*   1/1   */
$r1->set_numeros();
$r2 = new Racional();    /*   5/1  */
$r2->set_numeros(5);
$r3 = new Racional();  /*   5/6  */
$r3->set_numeros(5,6);
$r4 = new Racional();   /*   8/5  */
$r4->set_fraccion("8/5");


print "Valor racional r1 : " . $r1->get_numerador() . "/" . $r1->get_denominador() . "<br>";
print "Valor racional r2 : " . $r2->get_numerador() . "/" . $r2->get_denominador() . "<br>";
print "Valor racional r3 : " . $r3->get_numerador() . "/" . $r3->get_denominador() . "<br>";
print "Valor racional r4 : " . $r4->get_numerador() . "<br>";


?>
</body>
</html>

