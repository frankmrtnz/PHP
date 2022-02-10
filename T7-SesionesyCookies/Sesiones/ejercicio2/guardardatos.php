<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2 style="text-align:right;">Recoger datos</h2>

    <p>Recogeremos aquí más datos, los cuales serán almacenados para toda la sesión.</p>
    <p>Has recorrido o recargado  
        <?php 
            session_start();
            if(isset($_SESSION['contador'])) {
                $_SESSION['contador'] += 1;
            } else {
                $_SESSION['contador'] = 1; 
            }
            print "<b>".$_SESSION['contador']."</b>";
        ?>  
        páginas hasta ahora.
    </p>
    <form action="guardardatos.php" method="POST">
        <p>Nombre: <input type="text" name="nombre"></p>
        <p>Ciudad: <input type="text" name="ciudad"></p>
        <p>E-mail: <input type="email" name="email"></p>
        <p>Teléfono: <input type="number" name="tlf"></p>
        <p>Signo del zodiaco: 
            <select name="zodiaco">
                <option></option>
                <option value="Aries">Aries</option>
                <option value="Tauro">Tauro</option>
                <option value="Géminis">Géminis</option>
                <option value="Cancer">Cancer</option>
                <option value="Leo">Leo</option>
                <option value="Virgo">Virgo</option>
                <option value="Libra">Libra</option>
                <option value="Escorpio">Escorpio.</option>
                <option value="Sagitario">Sagitario.</option>
                <option value="Capricornio">Capricornio.</option>
                <option value="Acuario">Acuario.</option>
            </select>
        </p>
        <p><button type="submit" name="enviar">enviar</button></p>
    </form>

    <br>
    <h3>Datos recogidos:</h3>
    
    <?php 

        function sanear($var) {
            $tmp = isset($_REQUEST[$var])
                ? trim(htmlspecialchars($_REQUEST[$var], ENT_QUOTES, "UTF-8"))
                : "";
            return $tmp;
        }

        $nombre = sanear('nombre');
        $ciudad = sanear('ciudad');
        $email = sanear('email');
        $tlf = sanear('tlf');
        $zodiaco = sanear('zodiaco');
        

        if ($nombre!="") {
            $_SESSION['nombre']=$nombre;
        }
        if ($ciudad!="") {
            $_SESSION['ciudad']=$ciudad;
        } 
        if ($email!=""){
            $_SESSION['email']=$email;
        }
        if ($tlf!="") {
            $_SESSION['tlf']=$tlf;
        }
        if ($zodiaco!=""){
            $_SESSION['zodiaco'] = $zodiaco;
        } 
    ?>
    <p>Nombre:  <?php 
                    if(isset($_SESSION['nombre'])) {
                        print $_SESSION['nombre']; 
                    } else {
                        print "No ha introducido";
                    } 
                ?>
    </p>
    <p>Ciudad:  <?php 
                    if(isset($_SESSION['ciudad'])) {
                        print $_SESSION['ciudad']; 
                    } else {
                        print "No ha introducido";
                    } 
                ?>
    </p>
    <p>Email:   <?php 
                    if(isset($_SESSION['email'])) {
                        print $_SESSION['email']; 
                    } else {
                        print "No ha introducido";
                    } 
                ?>
    </p>
    <p>Teléfono:    <?php 
                        if(isset($_SESSION['tlf'])) {
                            print $_SESSION['tlf']; 
                        } else {
                            print "No ha introducido";
                        } 
                    ?>
    </p>
    <p>Signo del zodiaco:   
        <?php 
            if(isset($_SESSION['zodiaco'])) {
                print $_SESSION['zodiaco']; 
            } else {
                print "No ha introducido";
            } 
        ?>
    </p>


    <br>
    <p>Página 1: <a href="contador.php">Reiniciar contador o sesión</a></p>
    <p>Página 3: <a href="mostrardatos.php">Datos de la sesión</a></p>
</body>
</html>