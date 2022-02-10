<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio4a</title>
</head>
<body>

<?php

    $color1 = rand(48,218);
    $color2 = rand(1,48);

    print "<p>Actualice la página para mostrar dos nuevos colores</p>";

    print   "<table style=width:50%>
                <tr style=height:60px>
                    <td style=background-color:hsl(".$color1.",100%,50%)></td>
                    <td style=background-color:hsl(".$color2.",100%,50%)></td>
                </tr>
            </table>";
            
?>

</body>
</html>