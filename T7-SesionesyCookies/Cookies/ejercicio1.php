<?php



if(isset($_COOKIE['ejercicio1'])) {
    print "<p>La cookie: '".$_COOKIE['ejercicio1']."' existe y es aceptada por el navegador.</p><br>";
} else {
    print "<p>La cookie no existe, la crearemos a continuación.</p><br>";
    setcookie("ejercicio1", "Prueba Ejercicio1");
}


print "<a href='ejercicio1.php'>Clic para recargar página</a>";


?>