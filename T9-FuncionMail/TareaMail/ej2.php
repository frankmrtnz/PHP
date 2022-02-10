<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EJ2-TareaMail</title>
</head>
<body>

<?php

function sanear($var) {
    $tmp = isset($_REQUEST[$var])
    ? trim(htmlspecialchars($_REQUEST[$var], ENT_QUOTES, "UTF-8"))
    : "";
    return $tmp;            
}

function enviarEmail($nombre, $email, $asunto, $mensaje) {
    //indico el envío en formato HTML
    $headers = "MIME-Version: 1.0\r\n";  

    //Añado a la cabecera el juego decaracteres que voy a usar
    $headers .= "Content-type: text/plain; charset=utf-8\r\n"; 
        
    //Añado a la cabecera si no pongo el de 8bit puede no coger las ñ, acentos, etc
    $headers .= "Content-Transfer-Encoding: 8bit\r\n";
    
    //Añado a la cabecera la dirección del remitente
    $headers .= "From: $nombre $nombre\r\n";

    //envio del correo con todos los parámetos configurados
    $ok=mail($email,$asunto,$mensaje,$headers);
    
    if ($ok) {
        print '<p style="color:green;">El E-Mail ha sido enviado</p>';
        print "<p>Haz <a href='ej2.php'>click para volver al formulario</a></p>";
    } else {
        $html  = "<html>";
		$html .= "<head>";

		// Después de 5 segundos de mostrarse esta página web de error se redirigiría a la URL especificada.
		$html .= "<meta http-equiv='refresh' content='5;url=ej2.php'>";

		$html .= "</head>";
		$html .= "<body>";
        $html .= "<p style='color:red;'>El E-Mail NO ha sido enviado</p>";
        $html .= "<p>Haz <a href='ej2.php'>click para volver al formulario</a></p>";
		$html .= "<p>En 5 segundos será redirigido a la página principal.</p>";
		$html .= "</body>";
		$html .= "</html>";

		print $html;
    }

}


if(isset($_REQUEST['enviar'])) {
    $nombre = sanear('nombre');
    $email = sanear('email');
    $mensaje = $_REQUEST['mensaje'];
    $asunto = "EJERCICIO 2";

    if(preg_match("/^(([A-Za-zÁÉÍÓÚÑáéíóúñÑ])+(\s)*([A-Za-zÁÉÍÓÚÑáéíóúñÑ])*)$/",$nombre)
            && filter_var( $email , FILTER_VALIDATE_EMAIL)
            && !empty($asunto)
            && !empty($mensaje)) {
        
                enviarEmail($nombre, $email, $asunto, $mensaje);

    } else {
        header('Refresh:5; url=ej2.php');
        print "<ul><li style='color:red;'>Tiene errores en los campos (Todos los datos son obligatorios y deben tener un formato correcto)</li></ul>";
        print "<p>Haz <a href='ej2.html'>click para volver al formulario</a></p>";
        print "<p>En 5 segundos será redirigido a la página principal.</p>";
    }

    

} else {
?>



    <form action="ej2.php" method="post">
        <p>
            Nombre: <input type="text" name="nombre">
            Email: <input type="text" name="email">
        </p>
        <p>
            Mensaje: <br> <textarea name="mensaje" cols="60" rows="15"></textarea>
        </p>
        <p>
            <button type="submit" name="enviar">Enviar</button>
        </p>
    </form>



<?php
}
?>

</body>
</html>



