<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p>Has recorrido o recargado  
        <?php 
            session_start();
            if(isset($_SESSION['contador'])) {
                $_SESSION['contador'] += 1;
            } else {
                $_SESSION['contador'] = 1; 
            }
            print "<b>".$_SESSION['contador']."</b>";
        ?>  
        páginas hasta ahora.
    </p>
    <table>
        <tr>
            <td style="border: 1px solid black;"><h4>Información de la sesión:</h4>
                <?php
                    print "<p>ID de sesión: " .session_id() ."</p>";
                    print "<p>Nombre de sesión: " .session_name(). "</p>";
                    print "<p>Ruta de guardar variables: " .session_save_path() ."</p>";
                    print "<p>Variables guardadas hasta ahora: <br> <ul>";
                        foreach ($_SESSION as $indice => $valor) {
                            print "<li> $indice = $valor </li>";
                        }
                    print "</ul>";        
                    print "</p>";
                ?>
            </td>
            <td style="border: 1px solid black;"><h4>Eliminar variables y acabar sesión:</h4>
                <form action="#" method="POST">
                    <p><input type="checkbox" name="unset"> Eliminar todos los datos.</p>
                    <p><input type="checkbox" name="destroy"> Acabar sesión. Empieza otra nueva, todos los datos se eliminan.</p>
                    <p><button type="submit" name="reiniciar">reiniciar</button></p>

                    <?php  
                        if(isset($_REQUEST['reiniciar'])) { 
                            if(isset($_REQUEST['unset'])) {
                                $unset=$_REQUEST['unset'];
                                if ($unset == "on") {
                                    session_unset();
                                    print "<p><b>Las variables se han borrado (session.unset())</b></p>";
                                }
                            }
                            
                            if(isset($_REQUEST['destroy'])) {
                                $destroy=$_REQUEST['destroy'];
                                if ($destroy == "on") {
                                    session_destroy(); 
                                    print "<p><b>La sesión se ha cerrado al completo (session.destroy())</b></p>";
                                }
                            }    
                        }  
                    ?>

                    <p>Para comprobarlo debes abrir otra página o recargar esta.</p>
                    <h4>Cambiar de página</h4>
                    <p>Ir a página 1: <a href="contador.php">Recargar y contar</a></p>
                    <p>Ir a página 2: <a href="guardardatos.php">Recoger datos</a></p>
                    <p>Recargar esta página: <a href="mostrardatos.php">Información y cierre</a></p>
                </form>
            </td>
        </tr>
    </table>
</body>
</html>