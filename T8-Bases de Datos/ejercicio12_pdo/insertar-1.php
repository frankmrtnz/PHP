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
    <h1 style="background-color: orange; color:white;">BASE DE DATOS 2-1 - AÑADIR 1</h1>
    <h3 style="background-color: #f5a33e;">
        <span style="padding:0px 20px;"><a href="principal.php" style="color:white;">Página inicial</a></span>
    </h3>
    <?php
        include("funciones.php");
        $conexion = conexion2($servidor,$usuario,$password,$basededatos);
        try {
            $consulta = "SELECT COUNT(*) FROM $tablaPersonas";
            $resultado = $conexion->query($consulta);
            if (!$resultado) {
                print "    <p>Error en la consulta.</p> <br>";
            } elseif ($resultado->fetchColumn() >= MAX_REG_TABLA_PERSONAS) {
                print "    <p>Se ha alcanzado el número máximo de registros que se pueden guardar.</p> <br>";
                print "    <p>Por favor, borre algún registro antes.</p> <br>";
            } else {
        ?>
        
        <form action="insertar-2.php" method="post">
            <p>Escriba los datos del nuevo registro:</p>
            <p>
                Nombre: <input type="text" name="nombre" >
                <br>
                Apellidos: <input type="text" name="apellidos">
            </p>
            <p>
                <button type="submit" name="insertar">Añadir</button>
                <button type="reset" name="resetear">Reiniciar formulario</button>
            </p>
        </form>

    <?php
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