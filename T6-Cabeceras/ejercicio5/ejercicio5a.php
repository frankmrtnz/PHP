<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>T6-Cabeceras</title>
</head>
<body>
    
    <form action='ejercicio5b.php' method='POST'>
        <p>
            Introduza nombre: <input type='text' name='nombre'
            <?php
            if(isset($_REQUEST['nombre'])) {
                $nombre = $_REQUEST['nombre'];
                print "value='$nombre'";
            } 
            ?>
            >
            <?php
                if(isset($_REQUEST['error'])) {
                    if($_REQUEST['error'] == 1 && $nombre != "") { 
                        print "<span style='color:red;'>No ha escrito su nombre o los caracteres no son los esperados</span>";     
                    } else if($nombre == "") {
                        print "<span style='color:red;'>No ha introducido su nombre</span>";     
                    }          
                }
            
            ?>
        </p>
        <p>
            Introduza su edad (entre 18 y 130): <input type='text' name='edad' 
            <?php
            if(isset($_REQUEST['edad'])) {
                $edad = $_REQUEST['edad'];
                print "value='$edad'";
            } 
            ?>
            >

            <?php
                if(isset($_REQUEST['error'])) {
                    if($_REQUEST['error'] == 2 && $edad != "") {    
                        print "<span style='color:red;'>Su edad no está entre 18 y 130 o los caracteres no son los esperados</span>";   
                    } else if($_REQUEST['error'] == 2 && $edad == "") {
                        print "<span style='color:red;'>No ha introducido su edad</span>";  
                    }
                }
            ?>
        </p>
        <p>
            <button type='submit' name='enviar'>Comprobar</button>
            <button type="reset" name="resetear">Borrar</button>
        </p>
    </form>

</body>
</html>