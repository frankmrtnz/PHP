<?php


function sanear($var){
    $tmp = isset($_REQUEST[$var])
            ? trim(htmlspecialchars($_REQUEST[$var],ENT_QUOTES,"UTF-8"))
            : "";
    return $tmp;
}


if(isset($_REQUEST['enviar'])){

    $nombre=sanear('nombre');
    $edad=sanear('edad');

    if(preg_match("/^[a-zA-Z]+$/", $nombre)){
        print "Su nombre es: $nombre<br>";
    } else {
        header("location:ejercicio5a.php?error=1&nombre=$nombre&edad=$edad");
    }


    if(preg_match("/^[0-9]+$/", $edad) && $edad>=18 && $edad<=130) {
        print "Su edad es: $edad<br>";
    } else {
        header("location:ejercicio5a.php?error=2&nombre=$nombre&edad=$edad");
    }

}


?>