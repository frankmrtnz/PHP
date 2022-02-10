<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>T4-RecogidayVerificacionDatos</title>
</head>

<?php

if(isset($_REQUEST['enviar'])) {
    print "<h1 style='text-align:center;'>DATOS PERSONALES 4 (RESULTADO)</h1>";

    if(isset($_REQUEST['aficiones'])) {
        $aficiones = [$_REQUEST['aficiones']];
        foreach($aficiones as $indice => $valor) {
            for($i=0;$i<3;$i++) {
                if(isset($valor[$i])) {
                    print "Le gusta: <b>$valor[$i]</b><br>";
                }
            }
        }
    } else {
        print "<span style='color:red;'>No ha indicado ninguna afición.</span><br>";
    }

    print "<br>";
    print "<p><a href='ejercicio3.php'>Volver al inicio.</a></p>";

} else {
?>

<body>
    
    <h1 style='text-align:center;'>DATOS PERSONALES 4 (FORMULARIO)</h1>

    <form action="ejercicio3.php" method="POST">
        <p>Indique sus aficiones:<br>
            <b>Aficiones: </b>
            <input type="checkbox" name="aficiones[]" value="cine">Cine
            <input type="checkbox" name="aficiones[]" value="literatura">Literatura
            <input type="checkbox" name="aficiones[]" value="música">Música
        </p>
        <p>
            <button type="submit" name="enviar">Enviar</button>
            <button type="reset" name="resetear">Resetear</button>
        </p>
    </form>

</body>

<?php
}
?>

</html>