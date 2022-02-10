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


    function sanear($var) {
        $tmp = isset($_REQUEST[$var])
            ? trim(htmlspecialchars($_REQUEST[$var], ENT_QUOTES, "UTF-8"))
            : "";
        return $tmp;
    }


    if(isset($_REQUEST['enviar'])) {

        $nombre = sanear('nombre');
        $clave = sanear('clave');

        if($nombre == "usuario" && $clave == "123") {
            header("location: aplicacion.php");
            $_SESSION['nombre'] = $nombre;
            $_SESSION['clave'] = $clave;
        } else {
            header("location: acreditacion.php");
        }

    } else {
?>

<body>
    
<h1>Formulario de autenticación</h1>

<p>Aun no se ha autenticado rellene el formulario</p>
<p>Introduce tu nombre de usuario y contraseña</p>
<form action="#" method="POST">
    <p>Nombre de usuario: <input type="text" name="nombre"></p>
    <p>Contraseña: <input type="text" name="clave"></p>
    <p><button type="submit" name="enviar">Inicio de sesión</button></p>
</form>
<p>Para ENTRAR, debes INTRODUCIR <b>usuario</b> en el 1er campo y <b>123</b> en el 2do.</p>

</body>
<?php
}
?>
</html>