<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>T2-Arrays1</title>
</head>
<body>
    
<?php

$paises_capitales = ["Italia"=>"Roma", "Luxemburgo"=>"Luxemburgo", "Belgica"=>"Bruselas", "Dinamarca"=>"Copenhage",
    "Finlandia"=>"Helsinki", "Francia"=>"París", "Eslovakia"=>"Bratislava", "Eslovenia"=>"Ljubljana", 
    "Alemania"=>"Berlin", "Grecia"=>"Atenas", "Irlanda"=>"Dublín", "Holanda"=>"Amsterdam", "Portugal"=>"Lisboa",
    "España"=>"Madrid", "Suecia"=>"Estocolmo",  "Reino Unido"=>"Londres",  "Chipre"=>"Nicosia",  
    "República Checa"=>"Praga",  "Estonia"=>"Tallin",  "Hungría"=>"Budapest",  "Malta"=>"Valetta",
    "Austria"=>"Viena",  "Polonia"=>"Varsovia"];

print "<b>[PAÍS] => CAPITAL</b><br>";
foreach ($paises_capitales as $indice => $valor){
    print "[$indice] => " . $valor . "<br>";
}

?>

</body>
</html>