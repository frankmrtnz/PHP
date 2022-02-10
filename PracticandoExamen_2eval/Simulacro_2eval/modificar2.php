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

        if(isset($_REQUEST['modificar'])) {

            if(isset($_REQUEST['id'])) {
                // Selección de la base de datos utilizar
                $conexion = conexion2($servidor,$usuario,$password,$basededatos);
                
                $id = $_REQUEST['id'];
                $consulta = "SELECT * FROM $tablaViviendas WHERE _id=$id";
    
                $resultado = $conexion->query($consulta);
                if(!$resultado) {
                    print "    <p>Error en la consulta.</p> <br>";
                } else {
                    print "<p>Modifique los campos que desee:</p>";
    
                    print "<form action='modificar3.php' method='post'>";
    
                    //Bucle foreach que recorre cada registro y muestra cada campo en la tabla
                    foreach($resultado as $valor) {
                        print "<p>
                            <input type='hidden' name='id' value='".$valor['_id']."'> 
                            Localidad: <input type='text' name='localidad' value='".$valor['localidad']."'> <br>
                            Dirección: <input type='text' name='direccion' value='".$valor['direccion']."'>
                            Número: <input type='number' name='numero' value='".$valor['numero']."'>
                            Piso: <input type='text' name='piso' value='".$valor['piso']."'> <br>
                            Foto: <input type='text' name='foto' value='".$valor['foto']."'> (Debe existir en el directorio interno de imagenes)
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
}
?>