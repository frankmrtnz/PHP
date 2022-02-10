

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
    print "<h1 style='text-align:center;'>DATOS PERSONALES 2 (RESULTADO)</h1>";

    if(isset($_REQUEST['nombre'])) {
        $nombre = $_REQUEST['nombre'];
        if($nombre == "") {
            print "<span style='color:red;'>No ha escrito su nombre.</span><br>";
        } else {
        print "<b>Su nombre es $nombre</b><br>";
        }
    }

    if(isset($_POST['apellidos'])) {
        $apellidos = $_POST['apellidos'];
        if($apellidos == "") {
            print "<span style='color:red;'>No ha escrito sus apellidos.</span><br>";
        } else {
        print "<b>Sus apellidos son $apellidos</b><br>";
        }
    }
    
    print "<br>";
    print "<p><a href='ejercicio1.php'>Volver al inicio.</a></p>";

} else {
?>

<body>

    <h1 style='text-align:center;'>DATOS PERSONALES 2 (FORMULARIO)</h1>

    <form action="ejercicio1.php" method="POST">
        <p>Escriba su nombre: <input type="text" name="nombre"></p>
        <p>Escriba sus apellidos: <input type="text" name="apellidos"></p>
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