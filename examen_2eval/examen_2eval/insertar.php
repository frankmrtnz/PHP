<?php
    session_start();
    if(!isset($_SESSION['autentificado']) || $_SESSION['autentificado']!="SI") {
        header("location:index.php");
    } else {

?>

<HTML LANG="es">

<HEAD>
   <TITLE>Solicitud de vivenda</TITLE>
   <LINK REL="stylesheet" TYPE="text/css" HREF="#">
</HEAD>

<BODY>

<?php

        include("funciones.php");

if(isset($_REQUEST['insertar'])) {
    $tipo = $_REQUEST['tipo'];
    // print $tipo;
    $zona = $_REQUEST['zona'];
    // print $zona;
    $direccion = sanear('direccion');
    // print $direccion;
    $numDormitorios = $_REQUEST['ndormitorios'];
    // print $numDormitorios;
    $precio = sanear('precio');
    // print $precio;
    $tamano = sanear('tamano');
    // print $tamano;
    if(isset($_REQUEST['extras'])) {
        $extras = $_REQUEST['extras'];
        for($i=0; $i<count($extras); $i++) {
            $extrasIntroducidos = $extras[$i].",";
        }
    } else {
        $extrasIntroducidos = "";
    }
    
    $observaciones = sanear('observaciones');
    // print $observaciones;


    if(!isset($_REQUEST['tipo'])) {
        print "<p style='color:red;'>Error en el tipo </p>";
        array_push($errores, 'Error en el tipo');
    }
    if(!isset($_REQUEST['zona'])) {
        print "<p style='color:red;'>Error en la zona </p>";
        array_push($errores, 'Error en la zona');
    }
    if($direccion=="" || !preg_match("/^[[:alnum:]]/", $direccion)) {
        print "<p style='color:red;'>Error en dirección </p>";
        array_push($errores, 'Error en la dirección');
    }
    if(!isset($_REQUEST['ndormitorios'])) {
        print "<p style='color:red;'>Error en el nº dormitorios </p>";
        array_push($errores, 'Error en el nº de dormitorios');
    }
    if($precio=="" || !preg_match("/^[[:digit:]]/", $precio)) {
        print " <p style='color:red;'>Error en el precio </p>";
        array_push($errores, 'Error en el precio');
    }
    if($tamano=="" || !preg_match("/^[[:digit:]]/", $tamano)) {
        print "<p style='color:red;'>Error en el tamaño </p>";
        array_push($errores, 'Error en el tamaño');
    }
    
    if(is_uploaded_file($_FILES['archivo']['tmp_name'])) {
        $nombreDirectorio = "imagenes/";
        if(!is_dir($nombreDirectorio)) {
            mkdir($nombreDirectorio);
        }
        $nombreFichero="";
        $nombreFichero = $_FILES['archivo']['name'];
        $nombreCompleto = $nombreDirectorio.$nombreFichero;
        if(file_exists($nombreCompleto)) {
            $idUnico = time();
            $nombreFichero = $idUnico.$nombreFichero;
            $nombreCompleto = $nombreDirectorio.$nombreFichero;
        }
        move_uploaded_file($_FILES['archivo']['tmp_name'], $nombreCompleto);
    } else {
        print "<p>No se ha subido fichero </p>";
        $errorFichero = $_FILES['archivo']['error'];
        if($errorFichero == 1) {
            array_push($errores, 'Fichero subido excede directiva upload_max_filesize de php.ini');
        } elseif($errorFichero == 2) {
            array_push($errores, 'Fichero subido excede directiva MAX_FILE_SIZE de php.ini');
        } 
    }

    if(!empty($errores)) {
        errores($errores);
        print "<a href='insertar.php'>Volver</a>";
    } else {

        print "<div class='menu'>
        <a href='aterrizaje.php'>Página principal</a> <br>
        <a href='consulta.php'>Consultar viviendas</a> <br>
        <a href='insertar.php'>Insertar nueva noticia</a> <br>
        <a href='borrar.php'>Eliminar viviendas</a> <br>
        <hr>
        <a href='cerrarSesion.php'>Desconectar</a>
    </div>";

        $nombreFichero = "";
        $nombreDirectorio = "imagenes/";
        $nombreFichero = $_FILES['archivo']['name'];
        $nombreCompleto = $nombreDirectorio.$nombreFichero;
        if(file_exists($nombreCompleto)) {
            $idUnico = time();
            $nombreFichero = $idUnico.$nombreFichero;
            $nombreCompleto = $nombreDirectorio.$nombreFichero;
        }
        move_uploaded_file($_FILES['archivo']['tmp_name'], $nombreCompleto);
        if($nombreFichero=="") {
            $nombreFichero = "(no hay)";   
        }

        print "<h3>Datos introducidos:</h3>";
        print "<ul>";
        print "<li>Tipo: $tipo</li>";
        print "<li>Zona: $zona</li>";
        print "<li>Direccion: $direccion</li>";
        print "<li>Nº dormitorios: $numDormitorios</li>";
        print "<li>Precio: $precio</li>";
        print "<li>Tamaño: $tamano</li>";
        print "<li>Precio: $precio</li>";
        print "<li>Extras: $extrasIntroducidos</li>";
        print "<li>Foto: $nombreFichero</li>";
        print "<li>Observaciones: $observaciones</li>";
        print "</ul>";
        

        $conexion = conexion2($servidor, $usuario, $password, $basededatos);

        $consulta = "INSERT INTO $tablaViviendas (tipo, zona, direccion, dormitorios, precio, tamano, extras, foto)
            VALUES (:tipo, :zona, :direccion, :dormitorios, :precio, :tamano, :extras, :foto)";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute([":tipo"=>$tipo, ":zona"=>$zona, ":direccion"=>$direccion, ":dormitorios"=>$numDormitorios,
                ":precio"=>$precio, ":tamano"=>$tamano, ":extras"=>$extrasIntroducidos, ":foto"=>$nombreFichero]);
        if(!$resultado) {
            print "ERROR CONSULTA";
        } else {
            header('Refresh:20, url=aterrizaje.php');
            print "<p style='color:green'>INSERCIÓN REALIZADA CON ÉXITO, será redirigido en 20 segundos</p>";
        }
    }

} else {

?>

<div class="menu">
        <a href="aterrizaje.php">Página principal</a> <br>
        <a href="consulta.php">Consultar viviendas</a> <br>
        <a href="insertar.php">Insertar nueva noticia</a> <br>
        <a href="borrar.php">Eliminar viviendas</a> <br>
        <hr>
        <a href="cerrarSesion.php">Desconectar</a>
    </div>

<H1>Inserción de vivienda</H1>

<P>Introduzca los datos de la vivienda:</P>

<FORM CLASS="borde" ACTION="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" METHOD="POST" ENCTYPE="multipart/form-data">

<P><LABEL>Tipo de vivienda:</LABEL>
<SELECT NAME="tipo">

	<OPTION>Piso
	<OPTION>Adosado
	<OPTION>Chalet
	<OPTION>Casa

</SELECT></P>

<P><LABEL>Zona:</LABEL>
<SELECT NAME="zona">

	<OPTION>Centro
	<OPTION>Nervión
	<OPTION>Triana
	<OPTION>Aljarafe
	<OPTION>Macarena

</SELECT></P>

<P><LABEL>Dirección:</LABEL>
<INPUT TYPE="TEXT" NAME="direccion"

>
</P>

<P><LABEL>Número de dormitorios:</LABEL>

	<INPUT TYPE='radio' NAME='ndormitorios' VALUE='1'>1
	<INPUT TYPE='radio' NAME='ndormitorios' VALUE='2'>2
	<INPUT TYPE='radio' NAME='ndormitorios' VALUE='3' CHECKED>3
	<INPUT TYPE='radio' NAME='ndormitorios' VALUE='4'>4
	<INPUT TYPE='radio' NAME='ndormitorios' VALUE='5'>5

</P>

<P><LABEL>Precio:</LABEL>
	<INPUT TYPE="TEXT" NAME="precio"

> &euro;
</P>

<P><LABEL>Tamaño:</LABEL>
	<INPUT TYPE="TEXT" NAME="tamano"

> metros cuadrados
</P>

<P><LABEL>Extras (marque los que procedan):</LABEL>

<INPUT TYPE='checkbox' NAME='extras[]' VALUE='Piscina'>Piscina
<INPUT TYPE='checkbox' NAME='extras[]' VALUE='Jardín'>Jardín
<INPUT TYPE='checkbox' NAME='extras[]' VALUE='Garaje'>Garaje
<INPUT TYPE='checkbox' NAME='extras[]' VALUE='Sauna'>Sauna

</P>

<P><LABEL>Foto:</LABEL>
    <input type="hidden" name="MAX_FILE_SIZE" value="<?php echo 102400?>">
	<INPUT TYPE="FILE" NAME="archivo" value='examinar'>

</P>

<P><LABEL>Observaciones:</LABEL>
<TEXTAREA NAME="observaciones" COLS="50" ROWS="5"></TEXTAREA></P>

<P><INPUT TYPE="submit" NAME="insertar" VALUE="Insertar vivienda"></P>

</FORM>

<?php
    }
?>


</BODY>
</HTML>

<?php
    }
?>