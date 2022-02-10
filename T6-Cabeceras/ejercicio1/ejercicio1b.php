<?php



    //Función que llamaremos para sanear cada entrada del formulario
    function sanear($var) {
        $tmp = (isset($_REQUEST[$var]))
                ? trim(htmlspecialchars($_REQUEST[$var], ENT_QUOTES, "UTF-8"))
                : "";
        return $tmp;
    }

    if(isset($_REQUEST['enviar'])) {
        $enlace = sanear('enlace');
        if(filter_var($enlace, FILTER_VALIDATE_URL)) {
            header("location:$enlace");
        } else {
            header("location:ejercicio1a.php?error=1");
        }
    }

?>