<?php


    //Función que llamaremos para sanear cada entrada del formulario
    function sanear($var) {
        $tmp = (isset($_REQUEST[$var]))
                ? trim(htmlspecialchars($_REQUEST[$var], ENT_QUOTES, "UTF-8"))
                : "";
        return $tmp;
    }


    if(isset($_REQUEST['enviar'])) {
        $edad = sanear('edad');
        if($edad!="" && $edad>=18 && $edad<=130) {
            print "<p>Su edad es <b>$edad</b></p>";
            print "<p><a href='ejercicio4a.php'>Volver al formulario.</a></p>";
        } else {
            header("location:ejercicio4a.php?error=1&edad=$edad");
        }
    }



?>