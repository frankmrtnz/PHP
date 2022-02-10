<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=ç, initial-scale=1.0">
    <title>Document</title>
    <?php 
    
    if(isset($_COOKIE["logged"])){
        setcookie("logged");
        print "<p>Desonectado</p>";
    }else{
        print "<p>No existe conexión activa</p>";
    }

    print "<a href='operaciones'>Volver</a>";
    
    ?>
</head>
<body>
    
</body>
</html>