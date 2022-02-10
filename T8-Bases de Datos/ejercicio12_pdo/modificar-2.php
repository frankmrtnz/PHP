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
    <h1 style="background-color: orange; color:white;">BASE DE DATOS 2-1 - MODIFICAR 2</h1>
    <h3 style="background-color: #f5a33e;">
        <span style="padding:0px 20px;"><a href="principal.php" style="color:white;">Página inicial</a></span>
    </h3>

    <?php

    //Incluye funciones principales desde otro archivo
    include("funciones.php");


    

    
    if(isset($_REQUEST['modificar'])) {

        if(isset($_REQUEST['id'])) {
            // Selección de la base de datos utilizar
            $conexion = conexion2($servidor,$usuario,$password,$basededatos);
            
            $id = $_REQUEST['id'];
            $consulta = "SELECT * FROM personas WHERE id=$id";

            $resultado = $conexion->query($consulta);
            if(!$resultado) {
                print "    <p>Error en la consulta.</p> <br>";
            } else {
                print "<p>Modifique los campos que desee:</p>";

                print "<form action='modificar-3.php' method='post'>";

                //Bucle foreach que recorre cada registro y muestra cada campo en la tabla
                foreach($resultado as $valor) {
                    print "<p>
                        <input type='hidden' name='id' value='".$valor['id']."'> 
                        Nombre: <input type='text' name='nombre' value='".$valor['nombre']."'> <br>
                        Apellidos: <input type='text' name='apellidos' value='".$valor['apellidos']."'>
                        </p>";
                }
                
                print " <p>
                            <button type='submit' name='actualizar'>Actualizar</button>
                            <button type='reset' name='resetear'>Reiniciar formulario</button>
                        </p>";
                print "</form>";
            }
                    
            
            //Cerramos la conexión con la BD
            cerrarConexion($conexion);

        } else {
            print "No ha indicado ningún registro para modificar.<br>";
        }
            


    } else {
        print "<p>No ha pulsado el botón de 'Modificar registro'</p>";
    }


    

    ?>
</body>
</html>
<?php

} else {
    header("location:index.php");
}

?>