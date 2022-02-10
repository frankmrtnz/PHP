<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EJ4-POO</title>
</head>
<body>
<?php

class Racional {
    var $numerador;
    var $denominador;
    public static $contador;

    //Funcion __call que recoge el nombre sobrecargado
    function __call($metodo, $argumentos) {
        if ($metodo = 'set_racional'){
            self::$contador++;
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
    }

    //Convertir objeto en cadena
    public function __toString(){
        return $this->numerador.'/'.$this->denominador;
    }

    
    function contar() {
        static $contador;
        $this->contador =& $contador;
        $this->contador++;
        
        return $this->contador;
    }

}


print "<h3>instancio un objeto de cada caso y les visualizo como convirtiendo el objeto en cadena <br>";
$r1 = new Racional();     /*   1/1   */
$r1->set_racional();
print $r1 . "<br>";
$r2 = new Racional();    /*   5/1  */
$r2->set_racional(5);
print $r2 . "<br>";
$r3 = new Racional();   /*   5/4  */
$r3->set_racional(5,4);
print $r3 . "<br>";
print "Ahora tenemos ". $r3::$contador . " objetos racionales <br>";
print "instancio dos objetos más <br>";
$r4 = new Racional();   /*   3/6  */
$r4->set_racional(3,6);
print $r4 . "<br>";
$r5 = new Racional();   /* 4/3 */
$r5->set_racional(4,3);
print $r5 . "<br>";
print "Ahora tenemos ".$r5::$contador."<br>";
print "Podemos acceder con los objetos (y esto es de PHP) a un elemento estático <br>";
print "Según r1 tenemos ".$r1::$contador."<br>";
print "Según r2 tenemos ".$r2::$contador."<br>";
print "Según r3 tenemos ".$r3::$contador."<br>";
print "Según r4 tenemos ".$r4::$contador."<br>";
print "Según r5 tenemos ".$r5::$contador."<br>";
print "Según La Clase tenemos ".Racional::$contador."<br>";
print "</h3>";

?>
</body>
</html>