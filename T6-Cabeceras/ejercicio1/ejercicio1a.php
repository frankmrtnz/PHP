<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>T6-Cabeceras</title>
</head>
<body>
    


<form action='ejercicio1b.php' method='POST'>
    <?php
        if(isset($_REQUEST['error'])) {
            if($_REQUEST['error'] == 1) {
                print "<p style='color:red;'>Introdujo dirección incorrecta</p>";
            }
        }
    ?>
    <p>
        Introduza una dirección de un sitio web:<br>
        (ej http://www.google.com): <input type='text' name='enlace'>
    </p>
    <p>
        <button type='submit' name='enviar'>Redireccionar</button>
    </p>
</form>

</body>
</html>