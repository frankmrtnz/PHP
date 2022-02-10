<?php


    //Función que llamaremos para sanear cada entrada del formulario
    function sanear($var) {
        $tmp = (isset($_REQUEST[$var]))
                ? trim(htmlspecialchars($_REQUEST[$var], ENT_QUOTES, "UTF-8"))
                : "";
        return $tmp;
    }


    if(isset($_REQUEST['enviar'])) {
        $nombre = sanear('nombre');
        if(preg_match("/^[a-zA-Z]+$/", $nombre)) {
            print "<p>Su nombre es <b>$nombre</b></p>";
            print "<p><a href='ejercicio3a.php'>Volver al formulario.</a></p>";
        } else {
            header("location:ejercicio3a.php?error=1");
        }
    }



?>