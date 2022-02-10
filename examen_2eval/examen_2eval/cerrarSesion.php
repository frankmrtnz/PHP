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
        if(!isset($_SESSION['autentificado']) || $_SESSION['autentificado']!="SI") {
            print "<p>No existe una conexión activa</p>";
            print "<p><a href='index.php'>Conectar</a></p>";
        } else { 
            // session_start();
            session_destroy();
            print "<p>Conexión finalizada</p>";
            print "<p><a href='index.php'>Conectar</a></p>";
        }
    
    // header("location:index.php");

?>
</body>
</html>

