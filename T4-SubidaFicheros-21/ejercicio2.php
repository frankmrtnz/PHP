<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>T4-SubidaFicheros</title>
</head>

<?php

//Función que llamaremos para sanear cada entrada del formulario
function sanear($var) {
    $tmp = (isset($_REQUEST[$var]))
            ? trim(htmlspecialchars($_REQUEST[$var], ENT_QUOTES, "UTF-8"))
            : "";
    return $tmp;
}

if(isset($_REQUEST['enviar'])) {

    print "<h1 style='text-align:center;'>EJ2 - SUBIDA FICHEROS 1 (RESULTADO)</h1>";
    print "<h2>Resultado de la Inserción de Nueva Noticia</h2>";
    print "<p>La noticia ha sido recibida correctamente:</p>";

    print "<ul>";
    
    $titulo = sanear('titulo');
    if(preg_match("/^[a-zA-Z]+[0-9]*/", $titulo)) {
        print "<li>Título: <b>$titulo</b></li>";
    } else {
        print "<li><span style='color:red;'>Título introducido: $titulo no es válido o está vacío</span></li>";
    }


    $texto = sanear('texto');
    if(preg_match("/^[a-zA-Z]+[0-9]*/", $texto)) {
        print "<li>Texto: <b>$texto</b></li>";
    } else {
        print "<li><span style='color:red;'>Texto introducido: $texto no es válido o está vacío</span></li>";
    }


    if(isset($_REQUEST['categoria'])){
        $categoria = sanear('categoria');
        print "<li>Categoría: <b>$categoria</b></li>";
    }
    
    //Subida Imagen
    if(is_uploaded_file ($_FILES['imagen']['tmp_name'])) {
        $nombreDirectorio = "imagenes/";
        $nombreFichero = $_FILES['imagen']['name'];
        $nombreCompleto = $nombreDirectorio.$nombreFichero;
        if(is_file($nombreCompleto)) {
            $idUnico = time();
            $nombreFichero = $idUnico."-".$nombreFichero;
            $nombreCompleto = $nombreDirectorio.$nombreFichero;
        }
        move_uploaded_file($_FILES['imagen']['tmp_name'],$nombreCompleto);
        print "<li>Imagen: <a href='$nombreCompleto'><b>dourada.jpg</b></a></li>";              
    } else {
        print "<li>(No se ha podido subir el fichero)</li>";
    }

    print "</ul>";


    print "<p><a href='ejercicio2.php'>[ Insertar otra noticia ]</a></p>";



} else {
?>

<body>
    
<h1 style="text-align:center;">EJ2 - SUBIDA FICHEROS 1 (FORMULARIO)</h1>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
    <h2>Insertar nueva noticia</h2>
    <p>
        Título: *<input type="text" name="titulo" required> <br><br>
        Texto: *<textarea name="texto" cols="30" rows="10" required></textarea> <br><br>
        Categoría: 
        <select name="categoria" id="categoria">
            <option value="Costas">Costas</option>
            <option value="Playas">Playas</option>
            <option value="Lagunas">Lagunas</option>
            <option value="Ríos">Ríos</option>
        </select>
        <br><br>
        <input type="hidden" name="MAX_FILE_SIZE" value="<? echo $max_file_size; ?>">
        Imagen: <input type="file" name="imagen"> <br>
    </p>
    <p>
        <button type="submit" name="enviar">Insertar noticia</button>
    </p>
</form>

    <p>NOTA: los datos marcados con (*) deben ser rellenados obligatoriamente</p>

</body>

<?php
}
?>
</html>