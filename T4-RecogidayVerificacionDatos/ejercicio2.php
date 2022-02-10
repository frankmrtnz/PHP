<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>T4-RecogidayVerificacionDatos</title>
</head>

<?php


if(isset($_REQUEST['enviar'])){
    print "<h1 style='text-align:center;'>DATOS PERSONALES 3 (RESULTADO)</h1>";

    if(isset($_REQUEST['sexo'])){
        $sexo = $_REQUEST['sexo'];
        if($sexo == 'Hombre') {
            print "Es un <b>$sexo</b>";
        } else if ($sexo == 'Mujer') {
            print "Es una <b>$sexo</b>";
        } 
    } else {
        print "<span style='color:red;'>No ha indicado su sexo.</span><br>";
    }

    print "<br>";
    print "<p><a href='ejercicio2.php'>Volver al inicio.</a></p>";

} else {
?>

<body>
    <h1 style='text-align:center;'>DATOS PERSONALES 3 (FORMULARIO)</h1>

    <form action="ejercicio2.php" method="POST">
        <p>Indique su sexo:<br>
            Hombre <input type="radio" name="sexo" value="Hombre">
            Mujer <input type="radio" name="sexo" value="Mujer">
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