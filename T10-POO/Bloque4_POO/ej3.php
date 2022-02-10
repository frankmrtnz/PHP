<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EJ3-POO4</title>
</head>
<body>
    
<?php


    class Producto {
        protected $titulo;
        protected $precio;

        public function cargarProducto($tit,$pr) {
            $this->titulo=$tit;
            $this->precio=$pr;
        }

        public function imprimirTitulo() {
            return $this->titulo;
        }

        public function imprimirPrecio() {
            return $this->precio;
        }

    }

    class CD extends Producto {
        protected $duracion;

        public function cargarDuracion($dur) {
            $this->duracion=$dur;
        }

        public function imprimirDuracion() {
            return $this->duracion;
        }
    }

    class Libro extends Producto {
        protected $num_paginas;

        public function cargarNumPags($numpag) {
            $this->num_paginas=$numpag;
        }

        public function imprimirNumPags() {
            return $this->num_paginas;
        }
    }

    class LibroAntiguo extends Libro {
        protected $fecha;

        public function cargarFecha($f) {
            $this->fecha=$f;
        }

        public function imprimirFecha() {
            return $this->fecha;
        }
    }


print "<h1>HERENCIA Y SOBREESCRITURA DE MÉTODOS</h1>";

$libro = new Libro();
$libro->cargarProducto("El Lobo Estepario", 0);
$libro->cargarNumPags(237);

print "<h3>El libro es:</h3>";
print $libro->imprimirTitulo()." ".$libro->imprimirPrecio()."€ ".$libro->imprimirNumPags()."págs";

$libroAntiguo = new LibroAntiguo();
$libroAntiguo->cargarProducto("Quijote", 0);
$libroAntiguo->cargarNumPags(500);
$libroAntiguo->cargarFecha("1605 y 1614");

print "<h3>El libro Antiguo es:</h3>";
print $libroAntiguo->imprimirTitulo()." ".$libroAntiguo->imprimirPrecio()."€ ".$libroAntiguo->imprimirNumPags()."págs <br> Fecha:".$libroAntiguo->imprimirFecha();

$cd = new CD();
$cd->cargarProducto("Car Stevens", 0);
$cd->cargarDuracion(20);

print "<h3>El libro es:</h3>";
print $cd->imprimirTitulo()." ".$cd->imprimirPrecio()."€ ".$cd->imprimirDuracion()."mins";

?>

</body>
</html>