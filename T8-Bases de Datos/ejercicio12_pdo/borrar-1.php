<?php
session_start();

if(isset($_SESSION['email']) && isset($_SESSION['clave'])) {

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body style="background-color: burlywood;">
    <h1 style="background-color: orange; color:white;">BASE DE DATOS 2-1 - BORRAR 1</h1>
    <h3 style="background-color: #f5a33e;">
        <span style="padding:0px 20px;"><a href="principal.php" style="color:white;">Página inicial</a></span>
    </h3>


    <?php

    //Incluye funciones principales desde otro archivo
    include("funciones.php");


    // Selección de la base de datos utilizar
    $conexion = conexion2($servidor,$usuario,$password,$basededatos);
    try {
        $consulta = "SELECT COUNT(*) FROM $tablaPersonas";
        $resultado = $conexion->query($consulta);
        if (!$resultado) {
            print "    <p>Error en la consulta.</p> <br>";
        } elseif ($resultado->fetchColumn() == 0) {
            print "    <p>No se ha creado todavía ningún registro.</p> <br>";
        } else {
            $consulta = "SELECT * from personas ORDER BY nombre";

            $resultado = $conexion->query($consulta);
            if(!$resultado) {
                print "    <p>Error en la consulta.</p> <br>";
            } else {
                print "<p>Marque los registros que quiera borrar:</p>";
                print "<form action='borrar-2.php' method='post'>";
                print "<table style='border:1px solid black; text-align:center;'>";
                print " <tr>
                        <th style='border:1px solid black;'>Borrar</th>
                        <th style='border:1px solid black;'>Nombre</th>
                        <th style='border:1px solid black;'>Apellidos</th> 
                        </tr>";

                //Bucle while que recorre cada registro y muestra cada campo en la tabla
                foreach($resultado as $valor) {
                    print "<tr>";
                    print "<td style='border:1px solid black;'><input type='checkbox' name='ids[]' value='".$valor['id']."'></td>";
                    print "<td style='border:1px solid black;'>".$valor['nombre']."</td>";
                    print "<td style='border:1px solid black;'>".$valor['apellidos']."</td>";
                    print "</tr>";
                }

                print "</table>";

                print " <p>
                            <button type='submit' name='borrar'>Borrar registro</button>
                            <button type='reset' name='resetear'>Reiniciar formulario</button>
                        </p>";

                print "</form>";
            }

            
        }
    } catch (PDOException $e) {
        print "<p>Error: No puede conectarse con la base de datos.</p>";
        //En caso de error capturo el mensaje y lo muesto
        print "<p>Error: ". $e->getMessage() ."</p>";
        exit();
    }
    
    

    //Cerramos la conexión con la BD
    cerrarConexion($conexion);

    ?>
</body>
</html>
<?php

} else {
    header("location:index.php");
}

?>