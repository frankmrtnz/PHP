<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Autenticación</title>
</head>
<body>



<?php

    include("conexion_creacion.php");
    session_start();
    session_destroy(); //Eliminamos todos los datos y la sesión actual

    if(isset($_REQUEST['enviar'])) {

        $conexion = conexion2($servidor, $usuario, $password, $basededatos);

        $email = sanear('email'); 
        $usuario = sanear('usuario'); 
        $clave = $_REQUEST['clave']; 

        if(filter_var($email, FILTER_VALIDATE_EMAIL) && $usuario!="" && $clave!="") {
            $consulta = "SELECT * FROM usuarios WHERE email='$email' AND usuario='$usuario' AND clave='$clave'";
            $resultado = $conexion->query($consulta);
            if(!$resultado) {
                print "Error en la consulta";
            } else {
                if($resultado->rowCount() < 1) {
                    
                } else {
                    header('Refresh:3; url=aterrizaje.php');
                    print "<p style='color:green;'>Datos correctos. Será redirigido en 3 segundos.</p>";
                    session_start();
                    $_SESSION['autentificado'] = "SI";
                }
            }
        } else {
            header('Refresh:3; url=index.php');
            print "<p style='color:red;'>Datos incorrectos. Será redirigido en 3 segundos.</p>";
        }

    } else {
?>

<h1>LOGIN:</h1>
<form action="#" method="POST" style="border:1px solid black;">
    <fieldset>
        <legend>Examen 2daw - Autenticación</legend>
        <p>
            Email: <input type="email" name="email" placeholder="ejemplo@gmail.com">
        </p>
        <p>
            Usuario: <input type="text" name="usuario" placeholder="ejemplo">
        </p>
        <p>
            Clave: <input type="password" name="clave">
        </p>
        <p>
            <button type="submit" name="enviar">Ingresar</button>
            <button type="reset" name="reset">Borrar</button>
        </p>
</fieldset>
</form>


<?php
    }
?>

</body>
</html>