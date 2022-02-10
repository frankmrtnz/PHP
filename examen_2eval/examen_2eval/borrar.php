<?php
    session_start();
    if(!isset($_SESSION['autentificado']) || $_SESSION['autentificado']!="SI") {
        header("location:index.php");
    } else {

?>

<HTML LANG="es">

<HEAD>
   <TITLE>Borrar vivenda</TITLE>
   <LINK REL="stylesheet" TYPE="text/css" HREF="#">
</HEAD>

<BODY>

<div class="menu">
        <a href="aterrizaje.php">Página principal</a> <br>
        <a href="consulta.php">Consultar viviendas</a> <br>
        <a href="insertar.php">Insertar nueva noticia</a> <br>
        <a href="borrar.php">Eliminar viviendas</a> <br>
        <hr>
        <a href="cerrarSesion.php">Desconectar</a>
    </div>
<h2>Tabla viviendas</h2>
    <form action="borrar2.php" method="POST">
    <table style='border:1px solid black;'>
        <thead>
            <th style='border:1px solid black;'>Tipo</th>
            <th style='border:1px solid black;'>Zona</th>
            <th style='border:1px solid black;'>Dirección</th>
            <th style='border:1px solid black;'>Dormitorios</th>
            <th style='border:1px solid black;'>Precio</th>
            <th style='border:1px solid black;'>Tamaño</th>
            <th style='border:1px solid black;'>Extras</th>
            <th style='border:1px solid black;'>Foto</th>
            <th style='border:1px solid black;'>Borrar</th>
        </thead>
        <tbody>
        <?php

            include("funciones.php");
            $conexion = conexion2($servidor, $usuario, $password, $basededatos);
            $consulta = "SELECT COUNT(*) FROM $tablaViviendas";
            $resultado = $conexion->query($consulta);
            if(!$resultado) {
                PRINT "ERROR CONSULTA";
            } elseif($resultado->fetchColumn()<=0) {
                print "<p>AUN NO HAY REGISTROS CREADOS EN LA TABLA VIVIENDAS</p>";
                array_push($errores, 'No hay registros en tabla viviendas');
            } else {
                $consulta = "SELECT * FROM $tablaViviendas ORDER BY tipo";
                $resultado = $conexion->query($consulta);
                if(!$resultado) {
                    print "ERROR CONSULTA";
                } else {
                    foreach($resultado as $valor) {
                        print "<tr>";
                        print "<td style='border:1px solid black;'>".$valor['tipo']."</td>";
                        print "<td style='border:1px solid black;'>".$valor['zona']."</td>";
                        print "<td style='border:1px solid black;'>".$valor['direccion']."</td>";
                        print "<td style='border:1px solid black;'>".$valor['dormitorios']."</td>";
                        print "<td style='border:1px solid black;'>".$valor['precio']." €</td>";
                        print "<td style='border:1px solid black;'>".$valor['tamano']." m2</td>";
                        print "<td style='border:1px solid black;'>".$valor['extras']."</td>";
                        print "<td style='border:1px solid black;'>
                            <img src='imagenes/".$valor['foto']."'  style='width:100px;height:100px;'/>
                            </td>";
                        print "<td style='border:1px solid black;'>
                                <input type='checkbox' name='ids[]' value='".$valor['id']."'>
                            </td>";
                        print "</tr>";
                    }
                }
            }

            if(!empty($errores)) {
                errores($errores);
            }
        ?>
        </tbody>
    </table>
    <p>
        <button type="submit" name="borrar">Borrar vivienda/s marcadas</button>
        <button type="reset" name="resetear">Resetear</button>

    </p>
    </form>
    





</BODY>
</HTML>

<?php
    }
?>