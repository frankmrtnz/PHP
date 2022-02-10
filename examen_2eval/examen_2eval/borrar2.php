<?php
    session_start();
    if(!isset($_SESSION['autentificado']) || $_SESSION['autentificado']!="SI") {
        header("location:index.php");
    } else {

?>

<HTML LANG="es">

<HEAD>
   <TITLE>Borrar vivenda 2</TITLE>
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
    
        <?php

            include("funciones.php");

            if(isset($_REQUEST['borrar'])) {

                if(isset($_REQUEST['ids'])) {
                    $ids = $_REQUEST['ids'];

                    $conexion = conexion2($servidor, $usuario, $password, $basededatos);

                    foreach($ids as $indice => $valor){
                        $consulta = "DELETE FROM $tablaViviendas WHERE id='$valor'";
                        $resultado = $conexion->query($consulta);
                        if(!$resultado) {
                            print "ERROR CONSULTA";
                        } else {
                            print "<p style='color:green;'>REGISTRO BORRADO CORRECTAMENTE (ID=$valor)</p>";
                        }
                    }

                    header('Refresh:10; url=aterrizaje.php');
                    print "<p>Será redirigido en 10 segundos</p>";
                } else {
                    header('Refresh:10; url=aterrizaje.php');
                    print "<p style='color:red;'>NO HA SELECCIONADO REGISTRO PARA BORRAR </p> <br> Será redirigido en 10 segundos.";
                    array_push($errores, 'No ha seleccionado registro para borrar');
                }
                

            } else {
                header("location:borrar.php");
                print "No ha pulsado el botón de borrar";
            }



            if(!empty($errores)) {
                errores($errores);
            }
            
        ?>
        
    





</BODY>
</HTML>

<?php
    }
?>