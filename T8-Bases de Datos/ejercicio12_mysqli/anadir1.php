<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body style="background-color: burlywood;">
    <h1 style="background-color: orange; color:white;">BASE DE DATOS 1-6 - AÑADIR 1</h1>
    <h3 style="background-color: #f5a33e;">
        <span style="padding:0px 20px;"><a href="index.php" style="color:white;">Página inicial</a></span>
    </h3>
    <form action="anadir2.php" method="post">
        <p>Escriba los datos del nuevo registro:</p>
        <p>
            Nombre: <input type="text" name="nombre" >
            <br>
            Apellidos: <input type="text" name="apellidos">
        </p>
        <p>
            <button type="submit" name="anadir">Añadir</button>
            <button type="reset" name="resetear">Reiniciar formulario</button>
        </p>
    </form>
</body>
</html>