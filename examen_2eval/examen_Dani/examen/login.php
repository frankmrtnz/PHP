<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <style>

    p{
        text-align:center;
    }
    fieldset{
        width:30%;
        margin: 0 auto;
    }
    

    </style>
    <?php 
    
    include("funciones.php");

    if(isset($_REQUEST["submit"])){

        crearComprobar();
        if(login(sanear($_REQUEST["user"]),sanear($_REQUEST["pass"]))){
            print "<h2>USUARIO INICIADO SESIÓN CON EXITO</h2>";
            print "<a href='operaciones.php'>Página principal</a>";
        }else{
            print "<p>Acceso no autorizado</p>";
            print "<a href='login.php'>[ Conectar ]</a>";
        }
    
    }else{
    
    ?>
</head>
<body>
    
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
        <p>Esta zona tiene el acceso restringido.</p><p>Para entrar debe identificarse</p>
        <fieldset>
        <label for="user">Usuario</label><input type="text" name="user" id="user"><br>
        <label for="user">Clave</label><input type="password" name="pass" id="pass"><br>
        <input type="submit" name="submit" id="submit" value="entrar">

        </fieldset>
    </form>

</body>

<?php } ?>
</html>