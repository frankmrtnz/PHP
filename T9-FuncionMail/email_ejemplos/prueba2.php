<?php
$para = 'fmartinezmartin@educa.madrid.org';
$asunto = 'prueba2';
$descripcion = 'Voy a mandar un correo desde el localhost de apache';
$de = 'From: fmartinezmartin.daw@gmail.com';
if (mail($para, $asunto, $descripcion, $de))
{
echo "Correo enviado satisfactoriamente";
}
else{echo "Correo enviado ha tenido problemas";}
?>