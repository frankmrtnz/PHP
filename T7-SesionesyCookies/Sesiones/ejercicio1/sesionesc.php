<?php
session_start();
session_destroy();
print "<p>La sesión se ha destruido al completo (session_destroy())</p>";


print "<p><a href='sesiones.php'>Vuelva a empezar en la primera página</a></p>";


?>