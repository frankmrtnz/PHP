<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        session_start();
        if(isset($_SESSION['nombre']) && isset($_SESSION['clave'])) {
            print "<h2>Ahora estás en una aplicación segura</h2>";
            print "<p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Recusandae odio aliquam saepe nostrum? Asperiores quasi cupiditate, ipsam adipisci reiciendis earum at cum magni, sint est voluptate temporibus eos nesciunt recusandae!</p>";
            print "<br><p><b>Datos del usuario logueado:</b><br>";
            print $_SESSION['nombre'];
            print "<br>";
            print $_SESSION['clave'];
            print "</p>";
        } else {
            print "<p><b>El usuario no está logueado.</b></p>";
        }
        
    ?>
    <br>
    <p><a href="login.php">Hace click para salir</a></p>
</body>
</html>