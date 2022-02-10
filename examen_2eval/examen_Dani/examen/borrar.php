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
    img{
        width:200px;
    }
    table td{
        border: 1px solid black;
    }
    

    </style>
    <?php 
    
    include("funciones.php");

    comprobar();

    if(isset($_REQUEST["submit"])){

        try{

            $pdo = new PDO("mysql:host=localhost:3306;dbname=marzo","root","");
    
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
            if(isset($_REQUEST["eliminar"])){
                foreach ($_REQUEST["eliminar"] as $key => $value) {
                    $stmt = $pdo -> prepare("DELETE FROM viviendas WHERE ID=".$value);
                    $stmt->execute();
                }


            }

            

    
        }catch(PDOException $error){
            print $error->getMessage();
    
            if(!is_dir('errores')){
                mkdir('errores');
            }
    
            if(!is_file('./errores/ficheros.txt')){
                $f = fopen("./errores/ficheros.txt","w+");
            }else{
                $f = fopen("./errores/ficheros.txt","a+");
            }
    
            fwrite($f,$error->getMessage()."\r\n");
    
            fclose($f);
        }


    }

    try{

        $pdo = new PDO("mysql:host=localhost:3306;dbname=marzo","root","");

        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $pdo -> prepare("SELECT * FROM viviendas");
        $stmt->execute();

        print "<table>";

        print "<tr><td>Id</td><td>Tipo</td><td>Zona</td><td>Dirección</td><td>Dormitorios</td><td>Precio</td><td>Tamaño</td><td>Extras</td><td>Foto</td></tr>";

        print "<form method='POST' action='borrar.php'>";

        $hayAlgo=false;
        while($puntero = $stmt -> fetch(PDO::FETCH_ASSOC)){
            $hayAlgo=true;
            print "<tr>";

            foreach ($puntero as $key => $value) {
                if($key=="Foto"){
                print "<td><img src='".$value."'></td>";}else{
                    print "<td>".$value."</td>";
                }
                
            }

            print "<td><input type='checkbox' name='eliminar[]' value='".$puntero["Id"]."'></td>";

            print "</tr>";

        }

        if(!$hayAlgo){
            print "No hay registros";
        }


        print "</table>";

        print "<input type='submit' name='submit' id='submit' value='ELIMINAR'> </form>";

    }catch(PDOException $error){
        print $error->getMessage();

        if(!is_dir('errores')){
            mkdir('errores');
        }

        if(!is_file('./errores/ficheros.txt')){
            $f = fopen("./errores/ficheros.txt","w+");
        }else{
            $f = fopen("./errores/ficheros.txt","a+");
        }

        fwrite($f,$error->getMessage()."\r\n");

        fclose($f);
    }
    
    ?>
</head>
<body>
    
    <a href="operaciones.php">[ Volver ]</a>

</body>
</html>