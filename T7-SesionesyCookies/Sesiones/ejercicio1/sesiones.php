<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<?php

session_start();

?>
<body>
    <form action="sesionesb.php" method="POST">
        <p>Introduzca nombre de usuario: <input type="text" name="nombre"> </p>
        <p>Introduzca clave: <input type="text" name="clave"> </p>
        <p> <button type="submit" name="enviar">Confirmar</button> </p>
    </form>
</body>

</html>