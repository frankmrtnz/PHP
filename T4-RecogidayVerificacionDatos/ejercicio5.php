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

    print "<h1 style='text-align:center;'>DATOS PERSONALES 5 (RESULTADO)</h1>";

    if(isset($_REQUEST['edad'])){
        $edad = $_REQUEST['edad'];
        if($edad == '<20') {
            print "<p>Tiene menos de 20 años.</p>";
        } else if($edad == '20-39') {
            print "<p>Tiene entre 20 y 39 años.</p>";
        } else if($edad == '40-59') {
            print "<p>Tiene entre 40 y 59 años.</p>";
        } else if($edad == '>60') {
            print "<p>Tiene más de 60 años.</p>";
        } else {
            print "<span style='color:red;'>No ha indicado ninguna edad.</span><br>";
        }
        
    print "<br>";
    print "<p><a href='ejercicio5.php'>Volver al inicio.</a></p>";
    }
} else {
?>

<body>

    <h1 style='text-align:center;'>DATOS PERSONALES 5 (FORMULARIO)</h1>

    <form action="ejercicio5.php" method="POST">
        <p>Indique su edad:</p>
        <b>Edad:</b>
        <select name="edad" id="edad">
            <option value="...">...</option>
            <option value="<20">Menos de 20 años</option>
            <option value="20-39">Entre 20 y 39 años</option>
            <option value="40-59">Entre 40 y 59 años</option>
            <option value=">60">60 años o más</option>
        </select>
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