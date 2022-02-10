<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EJ1-POO4</title>
</head>
<body>
    
<?php

    class Operacion {
        protected $valor1;
        protected $valor2;
        protected $resultado;
        public function cargar1($v) {
            $this->valor1=$v;
        }
        public function cargar2($v) {
            $this->valor2=$v;
        }
        public function imprimirResultado() {
            print "<b>".$this->resultado."</b><br>";
        }
    }

    class Suma extends Operacion{
        public function operar() {
            $this->resultado=$this->valor1+$this->valor2;
        }
    }

    class Resta extends Operacion{
        public function operar() {
            $this->resultado=$this->valor1-$this->valor2;
        }
    }

    $suma=new Suma();
    $suma->cargar1(10);
    $suma->cargar2(10);
    $suma->operar();
    echo 'El resultado de la suma de 10+10 es: ';
    $suma->imprimirResultado();
    $resta=new Resta();
    $resta->cargar1(10);
    $resta->cargar2(5);
    $resta->operar();
    echo 'El resultado de la diferencia de 10-5 es: ';
    $resta->imprimirResultado();

?>


</body>
</html>