<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EJ2-POO</title>
</head>
<body>
    <form action="ej2.php" method="POST">
        <fieldset>
            <legend>Datos personales</legend>
            <p>Nombre: <input type="text" name="nombre"></p>
            <p>Sueldo: <input type="text" name="sueldo"></p>
            <p>
                <button type="submit" name="enviar">Enviar Consulta</button>
                <button type="reset" name="resetear">Borrar</button>
            </p>
        </fieldset>
    </form>


<?php

    if(isset($_REQUEST['enviar'])) {

        $nombreIntroducido = $_REQUEST['nombre'];
        $sueldoIntroducido = $_REQUEST['sueldo'];
        $patronNombre = "/^(([A-Za-zÁÉÍÓÚÑáéíóúñÑ])+(\s)*([A-Za-zÁÉÍÓÚÑáéíóúñÑ])*)$/";

        class Empleado {
            private $nombre;
            private $sueldo;

            function inicializar($nombreIntroducido, $sueldoIntroducido) {
                $this->nombre = $nombreIntroducido;
                $this->sueldo = $sueldoIntroducido;
            }
            
            function imprime() {
                print $this->nombre . "<br>";
                print "el empleado " . $this->nombre . " -";
                if($this->sueldo > 3000) {
                    print "paga impuestos";
                } else {
                    print "NO paga impuestos";
                }
            }
        }

        if(($nombreIntroducido != "" && preg_match($patronNombre, $nombreIntroducido)) 
            && is_numeric($sueldoIntroducido)) {
            $obj = new Empleado();
            $obj->inicializar($nombreIntroducido, $sueldoIntroducido);
            $obj->imprime();
        } else {
            print "<p style='color:red;'>El campo 'nombre' o campo 'sueldo' están vacíos o no tienen el formato correcto.</p>";
        }


    }

    

?>

</body>
</html>