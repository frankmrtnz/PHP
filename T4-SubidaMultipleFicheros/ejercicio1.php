<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>T4-SubidaMultipleFicheros</title>
</head>

<?php

    //Función para sanear las entradas del formulario
    function sanear($var) {
        $tmp = (isset($_REQUEST[$var]))
            ? trim(htmlspecialchars($_REQUEST[$var], ENT_QUOTES, "UTF-8"))
            : "";
        return $tmp;
    }



    if(isset($_REQUEST['enviar'])) {

        $nombre = sanear('nombre');
        print $nombre;
        if(preg_match("/^[a-zA-Z]+/s", $nombre)) {
            print "Nombre: <b>$nombre</b><br>";
        } else {
            print "<span style='color:red;'>Nombre introducido: $nombre no es válido o está vacío</span><br>";
        }


        $apellidos = sanear('apellidos');
        if(preg_match("/^[a-zA-Z]+/s", $apellidos)) {
            print "Apellidos: <b>$apellidos</b><br>";
        } else {
            print "<span style='color:red;'>Apellidos introducidos: $apellidos no son válidos o está vacío</span><br>";
        }

        
        $direccion = sanear('direccion');
        if(preg_match("/^[a-zA-Z]+[\,\º]*[0-9]*/", $direccion)) {
            print "Dirección: <b>$direccion</b><br>";
        } else {
            print "<span style='color:red;'>Dirección introducida: $direccion no es válida o está vacía</span><br>";
        }


        $directorioSubida = "imagenes/";
        if(isset($_POST['enviar']) && isset($_FILES['imagenes'])) {
            $nombres = $_FILES['imagenes']['name'];
            $temporales = $_FILES['imagenes']['tmp_name'];
            $tipos = $_FILES['imagenes']['type'];
            $errores = $_FILES['imagenes']['error'];
            //Iteramos sobre los arrays creados
            print "Las imágenes subidas son:<br>";
            for($i=0; $i<count($temporales); $i++) {
                if(move_uploaded_file($temporales[$i], $directorioSubida.$nombres[$i])) {
                    print "Se ha subido <b>{$nombres[$i]}</b> correctamente <br>";
                    print "<img src='./imagenes/$nombres[$i]'><br>";
                } else {
                    print "Ha habido algún error al subir alguno de los archivos seleccionados";
                }
            }        
        }


    } else {

?>

<body>
  
    <h1 style="text-align:center;">Formulario subida de archivos Múltiple</h1>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
        <p>
            Nombre: <input type="text" name="nombre">
            Apellidos: <input type="text" name="apellidos"> <br>
            Dirección: <input type="text" name="direccion">
        </p>
        <p>
            <h3>Elige al menos dos fotos</h3>
            <input type="file" name="imagenes[]" multiple="multiple">
        </p>
        <p>
            <button type="submit" name="enviar">Enviar</button>
        </p>
    </form>

</body>
<?php
}
?>
</html>