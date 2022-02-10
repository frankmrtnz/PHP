<?php
    session_start();
    if(!isset($_SESSION['autentificado']) || $_SESSION['autentificado']!="SI") {
        header("location:index.php");
    } else {

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>GESTIÓN DE viviendas</h1>
    <div class="menu">
        <a href="aterrizaje.php">Página principal</a> <br>
        <a href="consulta.php">Consultar viviendas</a> <br>
        <a href="insertar.php">Insertar nueva noticia</a> <br>
        <a href="borrar.php">Eliminar viviendas</a> <br>
        <hr>
        <a href="cerrarSesion.php">Desconectar</a>
    </div>
</body>
</html>

<?php
    }
?>