<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EJ4-POO2</title>
</head>
<body>
    <form action="ej4.php" method="POST">
        <fieldset>
            <legend>Coche ganador</legend>
            <p>
                <b>Coche 1:</b> <br>
                Nombre: <input type="text" name="nombre1">
                Velocidad: <input type="number" name="velocidad1"> Kms/h
            </p>
            <p>
                <b>Coche 2:</b> <br>
                Nombre: <input type="text" name="nombre2"> 
                Velocidad: <input type="number" name="velocidad2"> Kms/h
            </p>
            <p>
                <button type="submit" name="enviar">Enviar consulta</button>
            </p>
        </fieldset>
    </form>

<?php

    if(isset($_REQUEST['enviar'])) {

        $nombre1Introducido = $_REQUEST['nombre1'];
        $velocidad1Introducida = $_REQUEST['velocidad1'];
        $nombre2Introducido = $_REQUEST['nombre2'];
        $velocidad2Introducida = $_REQUEST['velocidad2'];

        class Coche {
            private $nombre;
            private $velocidad;

            public function __construct($nombreIntroducido, $velocidadIntroducida) {
                $this->nombre = $nombreIntroducido;
                $this->velocidad = $velocidadIntroducida;
            }

            public function __set($propiedad, $valor) {
                // la función strtolower convierte a minúsculas toda una cadena
                $temporal = strtolower($propiedad);
                // property_exists('nombreclase',nombrePropiedad) Verifica que la propiedad exista, en este caso el nombre es la cadena en "$temporal"
                //La función property_exists() no puede detectar propiedades que son accesibles de forma mágica usando el método mágico __get.
                if (property_exists('Coche', $temporal)) {
                    $this->$temporal = $valor;
                } else {
                    echo $var . " No existe.";
                }
            }

            public function __get($propiedad) {
                $temporal = strtolower($propiedad);
                // property_exists Verifica que exista
                if (property_exists('Coche', $temporal)) {
                    return $this->$temporal;
                } else {
                    // Retorna nulo si no existe
                    return NULL;
                }
            }
        }


        if($nombre1Introducido!="" && $nombre2Introducido!="" && !empty($velocidad1Introducida) && !empty($velocidad2Introducida)) {
            $coche1 = new Coche($nombre1Introducido, $velocidad1Introducida);
            $coche2 = new Coche($nombre2Introducido, $velocidad2Introducida);

            if($coche1->velocidad > $coche2->velocidad) {
                print "El coche con nombre <b>" . $coche1->nombre . "</b> y velocidad <b>" . $coche1->velocidad . " Kms/h</b> es el GANADOR";
            } elseif($coche1->velocidad == $coche2->velocidad) {
                print "No hay ningún coche ganador, ya que los dos tienen la misma velocidad: <br>";
                print "Velocidad coche 1: <b>" . $coche1->velocidad . " Kms/h</b> - Nombre: <b>" . $coche1->nombre . "</b><br>";
                print "Velocidad coche 2: <b>" . $coche2->velocidad . " Kms/h</b> - Nombre: <b>" . $coche2->nombre . "</b><br>";
            } else {
                print "El coche con nombre <b>" . $coche2->nombre . "</b> y velocidad <b>" . $coche2->velocidad . " Kms/h</b> es el GANADOR";
            }
        } else {
            print "<p style='color:red;'>Alguno de los campos está vacío, debe rellenar todos los campos.</p>";
        }
        


    }

?>

</body>
</html>