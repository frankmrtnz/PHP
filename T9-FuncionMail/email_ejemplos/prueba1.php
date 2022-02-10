<?php
$para = 'fmartinezmartin@educa.madrid.org';
$asunto = 'prueba1';
$descripcion = 'Voy a mandar un correo desde el localhost de apache';
$de = 'fmartinezmartin.daw@gmail.com';
// if (mail($para, $asunto, $descripcion, $de)) {
//     echo "Correo enviado satisfactoriamente por función mail DE PHP ver";
// } else {
//     echo "Correo enviado ha tenido problemas";
// }

$ok=mail($para, $asunto, $descripcion, $de);

	if ($ok)
	
		{print 'correo enviado con exito';}
	else 
		{print 'correo NO enviado con exito';}
?>
