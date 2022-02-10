<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EJ1-TareaMail</title>
</head>

<body>
    <form action="ej1.php" method="post">
        <p>Nombre: <br> <input type="text" name="nombre"></p>
        <p>Apellidos: <br> <input type="text" name="apellidos"></p>
        <p>Email: <br> <input type="text" name="email"></p>
        <p>Asunto: <br> <input type="text" name="asunto"></p>
        <p>Mensaje: <br> <textarea name="mensaje" cols="60" rows="10"></textarea></p>
        <p><button type="submit" name="enviar">Enviar</button></p>
    </form>


    <?php

    function sanear($var) {
        $tmp = isset($_REQUEST[$var])
        ? trim(htmlspecialchars($_REQUEST[$var], ENT_QUOTES, "UTF-8"))
        : "";
        return $tmp;            
    }

    function enviarEmail($nombre, $apellidos, $email, $asunto, $mensaje) {
        //indico el envío en formato HTML
        $headers = "MIME-Version: 1.0\r\n";  

        //Añado a la cabecera el juego decaracteres que voy a usar
        $headers .= "Content-type: text/html; charset=utf-8\r\n"; 
            
        //Añado a la cabecera si no pongo el de 8bit puede no coger las ñ, acentos, etc
        $headers .= "Content-Transfer-Encoding: 8bit\r\n";
        
        //Añado a la cabecera la dirección del remitente
        $headers .= "From: $nombre $apellidos\r\n";

        //envio del correo con todos los parámetos configurados
        $ok=mail($email,$asunto,$mensaje,$headers);
        if ($ok) {
            print '<p style="color:green;">Correo enviado con exito</p>';
        } else {
            print '<p style="color:red;">Correo NO enviado con exito</p>';
        }
    
    }


    if(isset($_REQUEST['enviar'])) {

        $nombre = sanear('nombre');
        $apellidos = sanear('apellidos');
        $email = sanear('email');
        $asunto = sanear('asunto');
        $mensaje = $_REQUEST['mensaje'];

        if(preg_match("/^(([A-Za-zÁÉÍÓÚÑáéíóúñÑ])+(\s)*([A-Za-zÁÉÍÓÚÑáéíóúñÑ])*)$/",$nombre)
            && preg_match("/^(([A-Za-zÁÉÍÓÚÑáéíóúñÑ])+(\s)*([A-Za-zÁÉÍÓÚÑáéíóúñÑ])*)$/",$apellidos)
            && filter_var( $email , FILTER_VALIDATE_EMAIL)
            && !empty($asunto)
            && !empty($mensaje)) {
                print "<p>Nombre: $nombre</p>";
                print "<p>Apellidos: $apellidos</p>";
                print "<p>Email: $email</p>";
                print "<p>Asunto: $asunto</p>";
                print "<p>Mensaje: $mensaje</p>";

                enviarEmail($nombre, $apellidos, $email, $asunto, $mensaje);
        } else {
            print "<ul><li style='color:red;'>Tiene errores en los campos (Todos los datos son obligatorios y deben tener un formato correcto)</li></ul>";
        }



    }
?>
</body>
</html>