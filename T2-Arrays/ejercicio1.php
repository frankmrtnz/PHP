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

    $dias = array("Lunes","Martes","Miércoles","Jueves","Viernes","Sábado","Domingo");
    
    print "<p><b> CON FOR: </b></p>";
    for($i=0; $i<7; $i++){
        print "[$i] => ". $dias[$i] . "<br>";
    }
    
    print "<br>";

    print "<p><b> CON FOREACH: </b></p>";
    foreach($dias as $indice => $valor){
        print "[$indice] => " . $valor . "<br>";
    }
    

?>

</body>
</html>