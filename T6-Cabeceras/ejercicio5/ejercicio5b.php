

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
    $edad = sanear('edad');

    if(preg_match("/^[a-zA-ZáéíóúÁÉÍÓÚ]+$/", $nombre)) {
        print "<p>Su nombre es <b>$nombre</b></p>";
    } else {
        header("location:ejercicio5a.php?error=1&nombre=$nombre&edad=$edad");
    }

    if($edad!="" && $edad>=18 && $edad<=130 && (preg_match("/^[0-9]+$/", $edad) )) {
        print "<p>Su edad es <b>$edad</b></p>";
    } else {
        header("location:ejercicio5a.php?error=2&nombre=$nombre&edad=$edad");
    }
    print "<p><a href='ejercicio5a.php'>Volver al formulario.</a></p>";

    

}

?>