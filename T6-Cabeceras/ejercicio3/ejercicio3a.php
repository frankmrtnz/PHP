<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>T6-Cabeceras</title>
</head>
<body>
    
    <form action='ejercicio3b.php' method='POST'>
        <p>
            Introduza nombre: <input type='text' name='nombre'>
            <?php
            if(isset($_REQUEST['error'])) {
                if($_REQUEST['error'] == 1) {
                    print "<span style='color:red;'>No ha escrito su nombre o los caracteres no son los esperados</span>";
                }
            }
        ?>
        </p>
        <p>
            <button type='submit' name='enviar'>Comprobar</button>
            <button type="reset" name="resetear">Borrar</button>
        </p>
    </form>

</body>
</html>