<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EJ5-POO</title>
</head>
<body>
    <form action="ej5.php" method="POST">
        <fieldset>
            <legend>Datos del viaje</legend>
            <p>
                Planeta: <input type="text" name="planeta">
                Vehículo: <input type="text" name="vehiculo">
            </p>
            <p>
                <button type="submit" name="enviar">Enviar consulta</button>
            </p>
        </fieldset>
    </form>

<?php

    if(isset($_REQUEST['enviar'])) {
        $planetaIntroducido = $_REQUEST['planeta'];
        $vehiculoIntroducido = $_REQUEST['vehiculo'];

    
        class Viaje {

            private $planeta;
            private $vehiculo;
            private $planetas = array("Venus"=>"108200000", "Saturno"=>"1429400000", "Urano"=>"2870990000", 
                "Neptuno"=>"4504300000", "Plutón"=>"5913520000");
            private $vehiculos = array("Monopatín"=>"2", "Bicicleta"=>"20", "Dirigible"=>"16", "Submarino"=>"98");

            public function __construct($planetaIntroducido, $vehiculoIntroducido) {
                $this->planeta = $planetaIntroducido;
                $this->vehiculo = $vehiculoIntroducido;
            }

            public function __set($propiedad, $valor) {
                // la función strtolower convierte a minúsculas toda una cadena
                $temporal = strtolower($propiedad);
                // property_exists('nombreclase',nombrePropiedad) Verifica que la propiedad exista, en este caso el nombre es la cadena en "$temporal"
                //La función property_exists() no puede detectar propiedades que son accesibles de forma mágica usando el método mágico __get.
                if (property_exists('Viaje', $temporal)) {
                    $this->$temporal = $valor;
                } else {
                    echo $var . " No existe.";
                }
            }

            public function __get($propiedad) {
                $temporal = strtolower($propiedad);
                // property_exists Verifica que exista
                if (property_exists('Viaje', $temporal)) {
                    return $this->$temporal;
                } else {
                    // Retorna nulo si no existe
                    return NULL;
                }
            }

        }


        if($planetaIntroducido!="" && $vehiculoIntroducido!="") {
            $viaje1 = new Viaje($planetaIntroducido, $vehiculoIntroducido);
            foreach($viaje1->planetas as $indicePlanetas => $valorPlanetas) {
                foreach($viaje1->vehiculos as $indiceVehiculos => $valorVehiculos) {
                    if($viaje1->planeta == $indicePlanetas && $viaje1->vehiculo == $indiceVehiculos) {
                        print "El planeta es: ".$viaje1->planeta."<br>";
                        print "El vehiculo es: ".$viaje1->vehiculo."<br>";
                        $duracion = $valorPlanetas/($valorVehiculos*24);
                        print "vas a tardar: $duracion días";
                    }
                }
            }
        } else {
            print "<p style='color:red;'>Alguno de los campos está vacío, debe rellenar todos los campos.</p>";
        }


    }

?>
</body>
</html>