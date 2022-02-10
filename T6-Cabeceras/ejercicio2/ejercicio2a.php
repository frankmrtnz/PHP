<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>T6-Cabeceras</title>
</head>
<body>
    
    <form action='ejercicio2b.php' method='POST'>
        <?php
            if(isset($_REQUEST['error'])) {
                if($_REQUEST['error'] == 1) {
                    print "<p style='color:red;'>La clave es incorrecta, inténtelo de nuevo</p>";
                }
            }
        ?>
        <p>
            Introduza una clave(z80): <input type='text' name='clave'>
        </p>
        <p>
            <button type='submit' name='enviar'>Confirmar</button>
        </p>
    </form>

</body>
</html>