<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    

<form action="ejercicio5b.php" method="POST">

    <p>
    NOMBRE: <input type="text" name="nombre"
            <?php
                if(isset($_REQUEST['nombre'])) {
                    $nombre=$_REQUEST['nombre'];
                    print "value='$nombre'";
                }
            ?>
            >
    <?php
    if(isset($_REQUEST['error'])){
        if($_REQUEST['error']==1 && $nombre!="") {
            print "<span style='color:red;'>No ha introducido el nombre o no tiene el formato correcto</span>";
        } else if($nombre==""){
            print "<span style='color:red;'>El campo nombre está vacío</span>";
        }
    }
    ?>
    </p>

    <p>
    EDAD (De 18 a 130): <input type="text" name="edad"
                        <?php
                        if(isset($_REQUEST['edad'])){
                            $edad=$_REQUEST['edad'];
                            print "value='$edad'";
                        }
                        ?>
                        >
    <?php
    if(isset($_REQUEST['error'])){
        if($_REQUEST['error']==2 && $edad!=""){
             print "<span style='color:red;'>No ha introducido la edad o no tiene el formato correcto</span>";
        }  else if($edad==""){
            print "<span style='color:red;'>El campo edad está vacío</span>";
        } 
    } 
    ?>
    </p>

    <p>
        <button type="submit" name="enviar">Comprobar</button>
        <button type="reset" name="resetear">Borrar</button>
    </p>

</form>


</body>
</html>