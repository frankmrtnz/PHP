<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>T3-Funciones</title>
</head>
<body>
    
<?php

print "<h1 style='text-align: center;'>Ej11 - Pares del 12 al 48 (Función recursiva)</h1>";

print "<br><hr>";

print "Los números pares del 12 al 48 son: <br>";


function numerosPares($numeroPar) {
    if($numeroPar>=12 && $numeroPar<=48){
        if($numeroPar%2==0){
            print "$numeroPar <br>";
        }
        
        numerosPares(++$numeroPar);
    }
    
    
}


numerosPares(12);



?>

</body>
</html>