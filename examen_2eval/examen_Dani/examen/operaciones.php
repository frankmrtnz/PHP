<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Operaciones</title>
    <?php 
    
        include("funciones.php");

        comprobar();
        crearViviendas();
    
    ?>
</head>
<body>
    
    <h2>Gestión de viviendas</h2>

    <a href="mostrar.php">Consultar viviendas</a><br>
    <a href="insertar.php">Insertar vivienda </a><br>
    <a href="borrar.php">Eliminar vivienda</a><br><br>

    <a href="desconexion.php">[ Desconectar ]</a>

</body>
</html>