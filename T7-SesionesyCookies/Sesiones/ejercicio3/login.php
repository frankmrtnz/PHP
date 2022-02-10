<?php

session_start();

print "<p>FINALIZAR LA SESIÓN</p>";

print "<p>==========================================</p>";

print "<p>ID de la sesión: ".session_id()."</p>";
print "<p>Nombre de la sesión: ".session_name()."</p>";
print "<br>";

session_unset();
print "<p>La variable de sesión autenticado ya no está definida.</p>";
print "<p>Sesión finalizada correctamente.</p>";

print "<a href='aplicacion.php'>Comprobar los valores en otra página (no se mostrará nada por haber finalizado la sesión)</a><br>";
print "<a href='acreditacion.php'>Volver a la página principal</a>";

print "<p>Ahora estás fuera de la aplicación segura.</p>";




?>