<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EJ1-POO</title>
</head>
<body>
    <form action="ej1.php" method="POST">
        <fieldset>
            <legend>Datos personales</legend>
            <p>Nombre: <input type="text" name="nombre"></p>
            <p>
                <button type="submit" name="enviar">Enviar Consulta</button>
                <button type="reset" name="resetear">Borrar</button>
            </p>
        </fieldset>
    </form>


<?php
   

    if(isset($_REQUEST['enviar'])) {

        $nombreIntroducido = $_REQUEST['nombre'];
        $patronNombre = "/^(([A-Za-zÁÉÍÓÚÑáéíóúñÑ])+(\s)*([A-Za-zÁÉÍÓÚÑáéíóúñÑ])*)$/";

        class Persona {
            private $nombre;
            
            function inicializar($nombreIntroducido) { 
                $this->nombre = $nombreIntroducido;   
            }
            
            function imprime() {
                print $this->nombre . " Es el nombre que ha sido introducido";
            }
        } 

        if($nombreIntroducido != "" && preg_match($patronNombre, $nombreIntroducido)) {
            $obj = new Persona();
            $obj->inicializar($nombreIntroducido);
            $obj->imprime();
        } else {
            print "<p style='color:red;'>El nombre introducido está vacío o no tiene el formato correcto.</p>";
        }
        

    }

?>

</body>
</html>

