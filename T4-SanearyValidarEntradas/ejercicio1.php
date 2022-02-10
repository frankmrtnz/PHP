<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>T4-SanearyValidarEntradas</title>
</head>
<body>

<h1 style="text-align:center;">EJ1 - Sanear y Validar Entradas</h1>

<?php

$matrizPaises = array("España    " => "Peseta", "Italia" => "Lira", "Francia" => "Franco", 
                    "Reino Unido" => "Libra", "Alemania" => "Marco");



//Función recogida datos de un vector/matriz
function sanearVector($matriz) {
    $tmpMatriz = [];
    if(is_array($matriz)) {
        foreach($matriz as $indice => $valor) {
            $indiceSaneado = htmlspecialchars(trim(strip_tags($indice)), ENT_QUOTES, "UTF-8");
            $valorSaneado = htmlspecialchars(trim(strip_tags($valor)), ENT_QUOTES, "UTF-8");
            $tmpMatriz[$indiceSaneado] = $valorSaneado;
        }
    }
    return $tmpMatriz;
}

print "<b>Datos sin sanear:</b><br>";
print "<pre>";
print_r($matrizPaises);
print "</pre>";

print "<hr>";

print "<b>Datos saneados:</b><br>";
print "<pre>";
print_r(sanearVector($matrizPaises));
print "</pre>";


?>

</body>
</html>