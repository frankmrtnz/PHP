<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio6_Solucion</title>
</head>
<body>
<?php
    $dado = rand(1, 6);
    echo "<p>Actualiza la pagina para nueva tirada</p>\n";
    echo "<img src='img/$dado.svg' alt='dado' />\n";
    echo "<br><br>";
    echo "<svg width=500>

    <rect width=420 height=60 fill=white stroke-width=1 stroke=black />
    <line x1=70 y1=0 x2=70 y2=60 stroke=black stroke-width=2 />
    <text fill=#CCCCCC font-size=45 font-family=Verdana x=20 y=45>1</text>
    <line x1=140 y1=0 x2=140 y2=60 stroke=black stroke-width=2 />
    <text fill=#CCCCCC font-size=45 font-family=Verdana x=90 y=45>2</text>
    <line x1=210 y1=0 x2=210 y2=60 stroke=black stroke-width=2 />
    <text fill=#CCCCCC font-size=45 font-family=Verdana x=160 y=45>3</text>
    <line x1=280 y1=0 x2=280 y2=60 stroke=black stroke-width=2 />
    <text fill=#CCCCCC font-size=45 font-family=Verdana x=230 y=45>4</text>
    <line x1=350 y1=0 x2=350 y2=60 stroke=black stroke-width=2 />
    <text fill=#CCCCCC font-size=45 font-family=Verdana x=300 y=45>5</text>
    <text fill=#CCCCCC font-size=45 font-family=Verdana x=370 y=45>6</text>
    <circle cx=" . 35*($dado*2-1) . " cy=30 r=20 fill='red'></circle>
    </svg>\n";

?>

</body>
</html>