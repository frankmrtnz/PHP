<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body style="background-color: burlywood;">
    <h1 style="background-color: orange; color:white;">BASE DE DATOS 1-6 - BORRAR 1</h1>
    <h3 style="background-color: #f5a33e;">
        <span style="padding:0px 20px;"><a href="index.php" style="color:white;">Página inicial</a></span>
    </h3>
    <p>Marque los registros que quiera borrar:</p>


    <?php

    //Incluye funciones principales desde otro archivo
    include("funciones.php");


    // Selección de la base de datos utilizar
    $conexion = conexion2($servidor,$usuario,$password,$basededatos);

    $consulta = "SELECT * from personas ORDER BY nombre";

    $resultado = mysqli_query($conexion,$consulta) or die("La consulta no se pudo realizar");

    print "<form action='borrar2.php' method='post'>";
    print "<table style='border:1px solid black; text-align:center;'>";
    print " <tr>
            <th style='border:1px solid black;'>Borrar</th>
            <th style='border:1px solid black;'>Nombre</th>
            <th style='border:1px solid black;'>Apellidos</th> 
            </tr>";

    //Bucle while que recorre cada registro y muestra cada campo en la tabla
    while($columna = mysqli_fetch_array($resultado)) {
        print "<tr>";
        print "<td style='border:1px solid black;'><input type='checkbox' name='ids[]' value='".$columna['id']."'></td>";
        print "<td style='border:1px solid black;'>".$columna['nombre']."</td>";
        print "<td style='border:1px solid black;'>".$columna['apellidos']."</td>";
        print "</tr>";
    }

    print "</table>";

    print " <p>
                <button type='submit' name='borrar'>Borrar registro</button>
                <button type='reset' name='resetear'>Reiniciar formulario</button>
            </p>";

    print "</form>";

    //Cerramos la conexión con la BD
    cerrarConexion($conexion,$basededatos);

    ?>
</body>
</html>