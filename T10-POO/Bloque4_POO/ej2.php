<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EJ2-POO4</title>
</head>
<body>
    
<?php
    class Persona {
        protected $nombre;
        protected $edad;
        public function cargarDatosPersonales($nom,$ed) {
            $this->nombre=$nom;
            $this->edad=$ed;
        }
        public function imprimirNombre() {
            print $this->nombre."<br>";
        }
        public function imprimirEdad() {
            print $this->edad."<br>";
        }
    }

    class Empleado extends Persona{
        protected $sueldo;
        public function cargarSueldo($su) {
            $this->sueldo=$su;
        }
        public function imprimirSueldo() {
            print $this->sueldo."<br>";
        }
    }

    $persona1=new Empleado();
    $persona1->cargarDatosPersonales("Juan",25);
    $persona1->cargarSueldo(2400);
    print "<h3>el sueldo del empleado</h3>";
    $persona1->imprimirNombre();
    print "<h3>con:</h3>";
    $persona1->imprimirEdad();
    print "<h3>de edad es:</h3>";
    $persona1->imprimirSueldo();
    
?>

</body>
</html>