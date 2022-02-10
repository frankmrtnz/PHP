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
    <h1>Editar vivienda</h1>
    <?php

        include("funciones.php");

        print "<form action='modificar2.php' method='post'>";
        print "<table style='border:1px solid black; text-align:center;'>
                <thead>
                    <th style='border:1px solid black;'>Borrar</th>
                    <th style='border:1px solid black;'>Localidad</th>
                    <th style='border:1px solid black;'>Dirección</th>
                    <th style='border:1px solid black;'>Número</th>
                    <th style='border:1px solid black;'>Piso</th>
                    <th style='border:1px solid black;'>Foto</th>
                </thead>
                <tbody>";


                $conexion=conexion2($servidor,$usuario,$password,$basededatos);

                $consulta = "SELECT COUNT(*) FROM $tablaViviendas";
                $resultado = $conexion->query($consulta);
                if(!$resultado) {
                    print "ERROR EN CONSULTA";
                } elseif($resultado->fetchColumn()<=0) {
                    print "AUN NO HAY REGISTROS DE VIVIENDAS CREADOS";
                } else {
                    $consulta = "SELECT * FROM $tablaViviendas ORDER BY localidad";
                    $resultado = $conexion->query($consulta);
                    if(!$resultado) {
                        print "ERROR CONSULTA";
                    } else {
                        foreach($resultado as $valor) {
                            print "<tr>";
                            print "<td style='border:1px solid black;'><input type='radio' name='id' value='".$valor['_id']."'></td>";
                            print "<td style='border:1px solid black;'>".$valor['localidad']."</td>"; 
                            print "<td style='border:1px solid black;'>".$valor['direccion']."</td>";
                            print "<td style='border:1px solid black;'>".$valor['numero']."</td>";  
                            print "<td style='border:1px solid black;'>".$valor['piso']."</td>"; 
                            print "<td style='border:1px solid black;'><img src='imagenes/".$valor['foto']."' style='width:50px;height:50px;'/></td>"; 
                            print "</tr>";
                        }
                    }
                }
            print "</tbody></table>";
            print "<br>";
            print "<button type='submit' name='modificar'>Editar</button>";
            print "<button type='reset' name='resetear'>Resetear</button>";

            print "</form>";
    ?>



</body>
</html>

<?php
}
?>