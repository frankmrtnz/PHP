<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio4b</title>
</head>
<body>
    
<?php

$color1 = rand(64,255);
$color2 = rand(64,255);
$color3 = rand(64,255);

print "<svg width=1000 height=1000> 
        <circle cx=250 cy=200 r=90 stroke='black'
        stroke-width=2 fill='rgb($color1,$color2,$color3)' opacity='0.7'>
        </circle>
        <circle cx=200 cy=100 r=90 stroke='black'
        stroke-width=2 fill='rgb($color2,$color3,$color1)' opacity='0.7'>
        </circle>
        <circle cx=300 cy=100 r=90 stroke='black'
        stroke-width=2 fill='rgb($color3,$color2,$color1)' opacity='0.7'>
        </circle>
        </svg>";

?>

</body>
</html>