<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Autenticación</h1>
    <?php
                include("conexion_creacion.php");
                session_start();
                session_destroy();

                if(isset($_REQUEST['iniciaSesion'])) {
                    print "<form action='#' method='post' style='border: 1px solid black;'>
                            <legend>
                                <p>
                                    Usuario (email) <input type='text' name='usuario' placeholder='ejemplo@gmail.com'> <br>
                                    Password: <input type='password' name='clave'>
                                </p>
                        ";


                    // Selección de la base de datos utilizar
                    $conexion = conexion2($servidor,$usuario,$password,$basededatos);

                    //Recogemos datos del form
                    $usuario = sanear('usuario');
                    $clave = $_REQUEST['clave'];

                    if(filter_var($usuario, FILTER_VALIDATE_EMAIL)) {
                        //Preparo consulta
                        $consulta = "SELECT * FROM $tablaUsuarios WHERE email='$usuario'";

                        //Guardo resultado
                        $resultado = $conexion->query($consulta);
                        // print $resultado->rowCount();
                        if(!$resultado) {
                            print "<p>Error en la consulta.</p>";
                        } else {
                            if(($resultado->rowCount() < 1)) {
                                print "<p style='color:red;'>
                                            <b>Datos incorrectos</b>
                                        </p>";
                            } else {
                                foreach($resultado as $valor) {
                                    if($valor['email'] == $usuario && $valor['clave'] == $clave) {
                                        session_start();
                                        $_SESSION['email'] = $usuario;
                                        $_SESSION['clave'] = $clave;
                                        header("location:principal.php");
                                    } else {
                                        print "<p style='color:red;'>
                                                <b>Datos incorrectos</b>
                                            </p>";
                                    }      
                                }
                            } 
                        }

                        
                    } else {
                        print "<p style='color:red;'>
                                    <b>Datos incorrectos</b>
                                </p>";
                                    
                                
                    }
                    
                    print " <p>
                                <button type='submit' name='iniciaSesion'>Iniciar sesión</button>
                            </p>

                    
                        </legend>
                    </form>";

                    
                } else {
    ?>
    <form action="#" method="post" style="border: 1px solid black;">
        <legend>
            <p>
                Usuario (email) <input type="text" name="usuario" placeholder='ejemplo@gmail.com'> <br>
                Password: <input type="password" name="clave">
            </p>
            
            <p>
                <button type="submit" name="iniciaSesion">Iniciar sesión</button>
            </p>
        </legend>
    </form>
    <?php
    }
    ?>
</body>
</html>