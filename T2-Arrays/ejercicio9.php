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

print "<h1 style='text-align:right;'><b>ESTADIOS DE FOOTBALL</b></h1>";

$estadios = array("Barcelona"=>"Nou Camp", "Real Madrid"=>"Santiago Bernabeu", 
                "Valencia"=>"Mestalla", "Real Sociedad"=>"Anoeta");


print "<ol>";
foreach($estadios as $indice => $valor) {
    print "<li>El Equipo: $indice tiene el estadio: $valor</li>";
}
print "</ol>";


print "<b>Borrando el estadio del Real Madrid...</b>";
unset($estadios["Real Madrid"]);    //Borra el Real Madrid


print "<ol>";
foreach($estadios as $indice => $valor) {
    print "<li>El Equipo: $indice tiene el estadio: $valor</li>";
}
print "</ol>";


?>

</body>
</html>