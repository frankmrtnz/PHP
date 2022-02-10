<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio1-EstructurasControl</title>
</head>
<body>
    

<?php


    $dado1 = rand(1,6);
    $dado2 = rand(1,6);



    print "<h1>Dos dados</h1>";
    print "<p>Actualice la página para mostrar una nueva tirada.</p>";
    print "<img src='img/$dado1.svg' width='150px' height='150px'>";
    print "<img src='img/$dado2.svg' width='150px' height='150px'>";


    if($dado1 == $dado2) {
        print "<p>Ha salido una pareja de valores iguales.</p>";
    } else if($dado1 > $dado2) {
        print "<p>No ha sacado pareja. El valor más alto es $dado1.</p>";
    } else if($dado2 > $dado1) {
        print "<p>No ha sacado pareja. El valor más alto es $dado2.</p>";
    }
    

?>

</body>
</html>