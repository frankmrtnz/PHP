<?php
    session_start();
    session_destroy();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        include("conexion_creacion.php");


        if(isset($_REQUEST['enviar'])) {
            $user= sanear('usuario');
            $clave = sanear('clave');

            $conexion = conexion2($servidor, $usuario, $password, $basededatos);

            if($user != "" && $clave!="") {
                $consulta = "SELECT COUNT(*) FROM $tablaUsuarios WHERE username='$user' AND passwd='$clave'";
                $resultado = $conexion->query($consulta);
                if(!$resultado) {
                    print "ERROR CONSULTA";
                } elseif($resultado->rowCount()<1) {
                    print "Datos incorrectos <br> ACCESO NO AUTORIZADO <br>";
                    print "<a href='index.php'>Conectar</a>";
                } else {
                    header('Refresh:3, url=aterrizaje.php');
                    session_start();
                    $_SESSION['autentificado'] = "SI";
                    print "<p style='color:green;'>DATOS CORRECTOS, será redirigido en 3 segundos.</p>";
                    creaTablaViviendas($conexion);

                }
            } else {
                print "Datos incorrectos <br> ACCESO NO AUTORIZADO <br>";
                    print "<a href='index.php'>Conectar</a>";
            }
            
        } else {

    ?>
    <p style="text-align:center;">ZONA CON ACCESO RESTRINGIDO, DEBE IDENTIFICARSE</p>
    <form action="#" method="post">
        <fieldset>
            <legend>
                Identificación
            </legend>
            <p>
                Usuario: <input type="text" name="usuario">
            </p>
            <p>
                Clave: <input type="password" name="clave">
            </p>
            <p>
                <button type="submit" name="enviar">entrar</button>
            </p>
        </fieldset>
    </form>

    <?php
        }
    ?>

</body>
</html>