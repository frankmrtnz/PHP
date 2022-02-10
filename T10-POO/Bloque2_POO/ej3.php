<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EJ3-POO2</title>
</head>
<body>
    <form action="ej3.php" method="POST">
        <fieldset>
            <legend>Datos de la clase Persona</legend>
            <p>
                Filas: <input type="number" name="filas">
                Columnas: <input type="number" name="columnas">
                Valor fijo: <input type="text" name="valorFijo">
            </p>
            <p>
                <button type="submit" name="enviar">Enviar consulta</button>
            </p>
        </fieldset>
    </form>

<?php

    if(isset($_REQUEST['enviar'])) {

        $filasIntroducidas = $_REQUEST['filas'];
        $columnasIntroducidas = $_REQUEST['columnas'];
        $valorFijoIntroducido = $_REQUEST['valorFijo'];


        class Tabla {
            private $filas;
            private $columnas;
            private $valorfijo; 

            public function __construct($filasIntroducidas, $columnasIntroducidas) {
                $this->filas = $filasIntroducidas;
                $this->columnas = $columnasIntroducidas;
            }

            public function __set($propiedad, $valor) {
                // la función strtolower convierte a minúsculas toda una cadena
                $temporal = strtolower($propiedad);
                // property_exists('nombreclase',nombrePropiedad) Verifica que la propiedad exista, en este caso el nombre es la cadena en "$temporal"
                //La función property_exists() no puede detectar propiedades que son accesibles de forma mágica usando el método mágico __get.
                if (property_exists('Tabla', $temporal)) {
                    $this->$temporal = $valor;
                } else {
                    echo $var . " No existe.";
                }
            }

            public function __get($propiedad) {
                $temporal = strtolower($propiedad);
                // property_exists Verifica que exista
                if (property_exists('Tabla', $temporal)) {
                    return $this->$temporal;
                } else {
                    // Retorna nulo si no existe
                    return NULL;
                }
            }

        }


        if(!empty($filasIntroducidas) && !empty($columnasIntroducidas) && $valorFijoIntroducido!="") {
            $tabla1 = new Tabla($filasIntroducidas, $columnasIntroducidas);
            $tabla1->valorfijo = $valorFijoIntroducido;

            print "<table style='border:1px solid black;'>";
            for($i=0; $i<$tabla1->filas; $i++) {
                print "<tr>";
                for($j=0; $j<$tabla1->columnas; $j++) {
                    print "<td style='border:1px solid black;'>";
                    print $tabla1->valorfijo;
                    print "</td>";
                }
                print "</tr>";
            }
            print "</table>";
        } else {
            print "<p style='color:red;'>Alguno de los campos está vacío, debe rellenar todos los campos.</p>";
        }
        



    }

?>

</body>
</html>