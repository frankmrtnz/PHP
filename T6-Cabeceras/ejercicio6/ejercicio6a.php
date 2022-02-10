<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>T6-Cabeceras</title>
</head>
<body>

<h1 style="color:blue;">Agencia de viajes Travelmas</h1>

<?php

if(is_file("viajes.txt")) {
    $archivo = fopen("viajes.txt", "a+");
    rewind($archivo);

    print "<table style='text-align:center; border:1px solid black; border-collapse: collapse; background:beige; width:500px;'>";
        print   "<tr style='border:1px solid black; background: #b19cd9;'>
                    <th style='border:1px solid black;'>Nombre</th>
                    <th style='border:1px solid black;'>Destino</th>
                    <th style='border:1px solid black;'>Duración</th>
                    <th style='border:1px solid black;'>Salida</th>
                </tr>";

    while($lectura = fgets($archivo)) {
        $lectura = explode(":",$lectura);
        print "<tr >";
        foreach($lectura as $indice => $valor) {
            print "<td style='border:1px solid black;'>$valor</td>";
        }
        print "</tr>";
    }

    print "</table>";
}



if(isset($_REQUEST["error"])) {
    print "<br><br>";
    if($_REQUEST["error"] == 1) {
        print "<span style='color:red;'>Tiene que rellenar todos los campos (Nombre, destino, duración, salida)</span>";
    }
}


?>


<br><br>

<div id="contenidoForm" style="background:beige; border:1px solid black; width: 500px;">
    <form action="ejercicio6bV2.php" method="POST" >

        <p>Introduzca el nombre del circuito: <input type="text" name="nombre"></p>
        <p>Introduzca el destino: <input type="text" name="destino"></p>
        <p>Introduzca la duración: <input type="text" name="duracion"></p>
        <p>Introduzca los días de salida: <input type="text" name="salida"></p>

        <p>
            <button type="submit" name="enviar">Enviar</button>
        </p>
    </form>
</div>


</body>
</html>