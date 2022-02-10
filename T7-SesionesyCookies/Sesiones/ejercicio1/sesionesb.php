<?php

function sanear($var) {
    $tmp = isset($_REQUEST[$var])
            ? trim(htmlspecialchars($_REQUEST[$var], ENT_QUOTES, "UTF-8"))
            : "";
    return $tmp;
}

if(isset($_REQUEST['enviar'])) {

    $nombre = sanear('nombre');
    $clave = sanear('clave');

    $_SESSION['nombre'] = $nombre;
    $_SESSION['clave'] = $clave;

    if(isset($_SESSION['nombre']) && isset($_SESSION['clave'])) {
        print "<p><b>Nombre: </b> ".$_SESSION['nombre']."</p>";
        print "<p><b>Clave: </b> ".$_SESSION['clave']."</p>";
    } else {
        print "<p>La variable de sesion nombre y/o clave no existe</p>";
    }

    print "<br>";

    session_unset();
    print "<p>Tras mostrar los valores de la sesión, se destruyen los valores de la misma (session_unset())</p>";

    print "<p><a href='sesionesc.php'> Tercera página </a></p>";

} 

//session_destroy();



?>