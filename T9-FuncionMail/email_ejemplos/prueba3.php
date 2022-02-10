<?php
$destinatario = "fmartinezmartin@educa.madrid.org";
$asunto = "Este mensaje es de prueba3";
$cuerpo = '
			<html>
			<head>
			<title>Prueba de correo</title>
			</head>
			<body>
			<h1>Hola chicos!</h1>
			<p>
			<b>Bienvenidos al segundo ejemplo de envio de correo electrónico </b>.
			donde convive el texto plano y el de html.<br>Este cuerpo del mensaje es un envío de
			mails con PHP.
			Habría que cambiar todas las direcciones para hacer vuestras propias pruebas.
			</p>
			</body>
			</html>
';
//indico el envío en formato HTML

	$headers = "MIME-Version: 1.0\r\n";  
	
//Añado a la cabecera el juego decaracteres que voy a usar
$headers .= "Content-type: text/html; charset=utf-8\r\n"; 
	
//Añado a la cabecera si no pongo el de 8bit puede no coger las ñ, acentos, etc
	$headers .= "Content-Transfer-Encoding: 8bit\r\n";

//Añado a la cabecera la dirección del remitente
    $headers .= "From: Paco\r\n";
	
//Añado a la cabecera la dirección de respuesta, si queremos que sea distinta que la del remitente
	$headers .= "Reply-To: aitor.gonzalezgonzalez@educa.madrid.org\r\n";
//Añado a la cabecera las direcciones que recibián copia
	$headers .= "Cc: aitor.gonzalezgonzalez@educa.madrid.org\r\n";
//Añado a la cabecera las direcciones que recibián copia oculta
	$headers .= "Bcc: aitor.gonzalezgonzalez@educa.madrid.org\r\n";
	
//envio del correo con todos los parámetos configurados

$ok=mail($destinatario,$asunto,$cuerpo,$headers);

	if ($ok)
	
		{print 'correo enviado con exito';}
	else 
		{print 'correo NO enviado con exito';}
?>