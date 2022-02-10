<?php
session_start();
if(!isset($_SESSION['autentificado']) && $_SESSION['autenticado'] != "SI") {
    header("location: index.php");
} else {
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión Viviendas</title>
</head>
<body>
    <h1>SISTEMA GESTOR DE VIVIENDAS</h1>
    <div class="menu">
        <a href="aterrizaje.php" style="margin:15px">Página principal</a>
        <a href="insertar.php" style="margin:15px">Añadir vivienda</a>
        <a href="modificar.php" style="margin:15px">Editar vivienda</a>
        <a href="borrar.php" style="margin:15px">Borrar vivienda</a>
        <a href="truncar.php" style="margin:15px">Truncar vivienda</a>
        <a href="cierraSesion.php" style="margin:15px">Cerrar sesión</a>
    </div>
    <br><br>
    <h1>Truncar tabla viviendas</h1>
    <?php

        include("funciones.php");

        $conexion = conexion2($servidor,$usuario,$password,$basededatos);

        $consulta = "TRUNCATE TABLE $tablaViviendas";
        if(!$conexion->query($consulta)) {
            print "ERROR EN CONSULTA";
        } else {
            header('Refresh:3, url=aterrizaje.php');
            PRINT "TRUNCADO de tabla viviendas REALIZADO CON ÉXITO";
            print "<br> Será redirigido en 3 segundos";
        }

    ?>



</body>
</html>

<?php
}
?>