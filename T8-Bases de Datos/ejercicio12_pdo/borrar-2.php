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
    <h1 style="background-color: orange; color:white;">BASE DE DATOS 2-1 - BORRAR 2</h1>
    <h3 style="background-color: #f5a33e;">
        <span style="padding:0px 20px;"><a href="principal.php" style="color:white;">Página inicial</a></span>
    </h3>


    <?php

    //Incluye funciones principales desde otro archivo
    include("funciones.php");


    // Selección de la base de datos utilizar
    $conexion = conexion2($servidor,$usuario,$password,$basededatos);

    if(isset($_REQUEST['borrar'])) {

        if(isset($_REQUEST['ids'])) {
            $ids = $_REQUEST['ids'];
            foreach($ids as $indice => $valor) {
                $borrar = "DELETE FROM personas where id = $valor";
                if($conexion->query($borrar)) {
                    print "Registro borrado correctamente (ID = $valor).<br>"; 
                } else {
                    print "ERROR: El registro con id $valor no se ha borrado correctamente.<br>";
                }
            }
        } else {
            print "No ha indicado ningún registro para borrar.<br>";
        }


    } else {
        print "<p>No ha pulsado el botón de 'Borrar registro'</p>";
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