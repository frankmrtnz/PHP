<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio4-FORM</title>
</head>
<body>
    
<?php

print   "<h1 style='text-align:center;'>GRISES</h1>";
print   "<p>Haga clic en los iconos para oscurecer o aclarar el color gris del cuadro.</p>";


$boton = $_REQUEST['boton'];
$color = $_REQUEST['color'];


if ($boton == '+' && $color >= 0) {
    $color = $color - 10;
    //print $color;
} else if ($boton == '-' && $color <= 255) {
    $color = $color + 10;
    //print $color;
} else {
    $color = 127;
}

print   "<form action='ejercicio4.php' method='POST'>
            <table>
                <tr>
                    <td> 
                        <input type='submit' name='boton' value='+' style='width:50px; height:50px; font-size:25px;'>
                    </td>
                    <td>
                        <div style='width: 200px; height: 200px; background-color: rgb($color,$color,$color);'></div>
                    </td>
                    <td>
                        <input type='submit' name='boton' value='-' style='width:50px; height:50px; font-size:25px;'>
                    </td>
                    <td>
                        <input type='hidden' name='color' value='$color'>
                    </td>       
                </tr>
            </table>
        </form>";

?>


</body>
</html>