
<?php


//Funcion para sanear
function sanear($var){
    return trim(htmlspecialchars(($var), ENT_QUOTES, "UTF-8"));
}


$nombre = sanear($_REQUEST['nombre']);
$destino = sanear($_REQUEST['destino']);
$duracion = sanear($_REQUEST['duracion']);
$salida = sanear($_REQUEST['salida']);

$bool = true;
$cadena = $nombre.":".$destino.":".$duracion.":".$salida;

if($nombre!="" && $destino!="" && $duracion!="" && $salida!="") {
    if(is_file("viajes.txt")){
        $archivo = fopen("viajes.txt", "a+"); //Añade en ultima linea, Archivo ya existe
    } else {
        $archivo = fopen("viajes.txt", "w+"); //Crea Archivo vacío
    }
    rewind($archivo);
    

    if($bool){
        fwrite($archivo, $nombre.":".$destino.":".$duracion.":".$salida."\n");
        header("location:ejercicio6aV2.php");
    }
    
    fclose($archivo);
} else {
    header("location:ejercicio6aV2.php?error=1");
}


?>