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
    $fondo = $_REQUEST['fondo'];
    $letra = $_REQUEST['letra'];
    print "<body style='background-color:$fondo'>";
        print "<h1 style='text-align:center; color:$letra;'>COLORES 3 (RESULTADO)</h1>";

        print "<p style='color:$letra;'>Se han cambiado los colores elegidos.</p>";
        

        print "<br>";
        print "<p><a href='ejercicio4.php' style='color:$letra;'>Volver al inicio.</a></p>";
    print "</body>";

} else {
?>

<body>
    
    <h1 style='text-align:center;'>COLORES 3 (FORMULARIO)</h1>


    <form action="ejercicio4.php" method="POST">
        <p>Elija los colores a cambiar:<br>
        Color de fondo de la página: <input type="color" name="fondo"><br>
        Color de la letra de la página: <input type="color" name="letra"><br>
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





<?php







?>


</body>
</html>