<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>T6-Cabecera</title>
</head>
<body>
    
    <form action='ejercicio4b.php' method='POST'>
        <p>
            Introduza su edad (entre 18 y 130): <input type='text' name='edad' 
            <?php
            if(isset($_REQUEST['edad'])) {
                $edad = $_REQUEST['edad'];
                print "value='$edad'";
            }
            ?>
            >

            <?php
            if(isset($_REQUEST['error'])) {
                if($_REQUEST['error'] == 1) {
                    print "<span style='color:red;'>Su edad no está entre 18 y 130</span>";
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