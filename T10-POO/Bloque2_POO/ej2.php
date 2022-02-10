<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EJ2-POO2</title>
</head>
<body>
    <form action="ej2.php" method="POST">
        <fieldset>
            <legend>Datos de Usuario</legend>
            <p>
                Nombre: <input type="text" name="nombre">
                Edad: <input type="number" name="edad">
                Altura: <input type="number" name="altura">
            </p>
            <p>
                <button type="submit" name="enviar">Enviar consulta</button>
            </p>
        </fieldset>
    </form>

<?php

    if(isset($_REQUEST['enviar'])) {
        $nombreIntroducido = $_REQUEST['nombre'];
        $edadIntroducida = $_REQUEST['edad'];
        $alturaIntroducida = $_REQUEST['altura'];
        $patronNombre = "/^(([A-Za-zÁÉÍÓÚÑáéíóúñÑ])+(\s)*([A-Za-zÁÉÍÓÚÑáéíóúñÑ])*)$/";

        class Persona {
            private $nombre;
            private $edad;
            private $altura;

            public function __construct($nombreIntroducido) {
                $this->nombre = $nombreIntroducido;
            }


            public function __set($propiedad, $valor) {
                // la función strtolower convierte a minúsculas toda una cadena
                $temporal = strtolower($propiedad);
                // property_exists('nombreclase',nombrePropiedad) Verifica que la propiedad exista, en este caso el nombre es la cadena en "$temporal"
                //La función property_exists() no puede detectar propiedades que son accesibles de forma mágica usando el método mágico __get.
                if (property_exists('Persona',$temporal)) {
                    $this->$temporal = $valor;
                }
                else {
                    echo $var . " No existe.";
                }
            }

            public function __get($propiedad) {
                $temporal = strtolower($propiedad);
                // property_exists Verifica que exista
                if (property_exists('Persona', $temporal)) {
                    return $this->$temporal;
                } else {
                    // Retorna nulo si no existe
                    return NULL;
                }
            }
            
        }

        if(preg_match($patronNombre, $nombreIntroducido)) {
            $persona1 = new Persona($nombreIntroducido);
            $persona1->edad = $edadIntroducida;
            $persona1->altura = $alturaIntroducida;
            print "Mi nombre es " . $persona1->nombre . "<br>";
            print "Tengo " . $persona1->edad . " años <br>";
            print "y mido " . $persona1->altura . "cm";
        } else {
            print "<p style='color:red;'>El campo nombre está vacío o no tiene el formato correcto.</p>";
        }
        

    }

?>
</body>
</html>