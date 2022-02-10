<?php


    //Función que llamaremos para sanear cada entrada del formulario
    function sanear($var) {
        $tmp = (isset($_REQUEST[$var]))
                ? trim(htmlspecialchars($_REQUEST[$var], ENT_QUOTES, "UTF-8"))
                : "";
        return $tmp;
    }

    if(isset($_REQUEST['enviar'])) {
        $clave = sanear('clave');
        if($clave == "z80") {
            print "<h1>Bienvenido, la clave era la requerida</h1>";
        } else {
            header("location:ejercicio2a.php?error=1");
        }
    }



?>