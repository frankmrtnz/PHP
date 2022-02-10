<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<?php
session_start();


if(isset($_SESSION['contador'])) {
    $_SESSION['contador'] += 1;
} else {  
    $contador=1;
    $_SESSION['contador'] = $contador;
}

if(isset($_REQUEST['reiniciar'])) {
    //session_unset();
    $_SESSION['contador'] = 0;
}


?>

<body>
    <h2 style="text-align:right;">Contador de páginas</h2>

    <p>Número de páginas recorridas o recargadas: 
        <span style="background-color:lightblue; padding:10px">
        <?php
            print "<span style='color:blue;'>".$_SESSION['contador']."</span>"; 
        ?>
        </span>
    </p>
    <p>Recargar la página <a href="contador.php">aquí</a> . El contador se incrementa en 1.</p>
    <h4>Reiniciar el contador</h4>
    <form action="contador.php " method="POST">
        <p><input type="checkbox" name="reiniciar"> Elige esta opción y pulsa en enviar</p>
        <p><button type="submit" name="enviar">enviar</button></p>
    </form>
    <br>
    <p>Otras página de la sesión: <br>
        Página 2: <a href="guardardatos.php">Insertar más variables</a> <br>
        Página 3: <a href="mostrardatos.php">Datos de la sesión</a>
    </p>
</body>
</html>