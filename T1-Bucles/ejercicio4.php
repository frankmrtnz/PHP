<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bucles-Ejercicio4</title>
</head>
<body>
    
<?php

print "<h1 style='text-align:center'>CONTAR PARES E IMPARES</h1>";
print "<p>Actualice la página para mostrar una nueva tirada.</p>";


$cantidadDados = rand(1,10);
$contPares = 0;
$contImpares = 0;


for($i=1; $i<=$cantidadDados; $i++){
    $dado = rand(1,6);
    print "<img src='img/$dado.svg'  width='120px' height='120px'></img>";
    if ($dado%2 == 0){
        $contPares = $contPares+1;
    } else if ($dado%2 != 0) {
        $contImpares = $contImpares+1;
    }
}

print "<p>Han salido " .$contPares. " número/s pares y " .$contImpares. " número/s impares.</p>";


?>

</body>
</html>