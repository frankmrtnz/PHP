<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>T4-SanearyValidarEntradas</title>
</head>

<?php

//Función que llamaremos para sanear cada entrada del formulario
function sanear($var) {
    $tmp = (isset($_REQUEST[$var]))
            ? trim(htmlspecialchars($_REQUEST[$var], ENT_QUOTES, "UTF-8"))
            : "";
    return $tmp;
}


if(isset($_REQUEST['enviar'])) {

    print "<h1 style='text-align:center;'>EJ2 - Sanear y Validar Entradas (RESULTADO)</h1>";

    $nombre = sanear('nombre');
    if(preg_match("/^[a-zA-Z]+[0-9]*/", $nombre)) {
        print "Nombre: <b>$nombre</b><br>";
    } else {
        print "<span style='color:red;'>Nombre introducido no es válido o está vacío</span><br>";
        print "<span style='color:orange;'>Nombre introducido: <b>$nombre</b></span><br>";
    }


    $clave = sanear('clave');
    if(preg_match("/^[[:alnum:]\+\.\*\_\-\@]{5,}$/S", $clave)) {
        print "Contraseña: <b>$clave</b><br>";
    } else {
        print "<span style='color:red;'>Contraseña introducida no es válida o está vacía</span><br>";
        print "<span style='color:orange;'>Contraseña introducida: <b>$clave</b></span><br>";
    }      


    if(isset($_REQUEST['estudios'])) {
        $estudios = sanear('estudios');
        if(preg_match("/^[a-zA-Z]+/", $estudios)) {
            if($estudios == 'elemental') {
                print "Estudios: <b>Certificado Escolar</b> ($estudios)<br>";
            } else if($estudios == 'basico') {
                print "Estudios: <b>Graduado en E.S.O.</b> ($estudios)<br>";
            } else if($estudios == 'bachiller') {
                print "Estudios: <b>Bachiller - Formación Profesional</b> ($estudios)<br>";
            } else if($estudios == 'diplomado') {
                print "Estudios: <b>Diplomado</b> ($estudios)<br>";
            } else if($estudios == 'licenciado') {
                print "Estudios: <b>Licenciado o Doctorado</b> ($estudios)<br>";
            }
        } else {
            print "<span style='color:orange;'>Propiedad 'value' de estudios está vacía o no tiene el formato correcto.</span><br>";
        }
    } else {
        print "<span style='color:red;'>No ha indicado su nivel de estudios</span><br>";
    }


    if(isset($_REQUEST['nacionalidad'])) {
        $nacionalidad = sanear('nacionalidad');
        if(preg_match("/^[a-zA-Z]+/", $nacionalidad)) {
            print "Nacionalidad: <b>$nacionalidad</b><br>";
        } else {
            print "<span style='color:orange;'>Propiedad 'value' de nacionalidad está vacía o no tiene el formato correcto.</span><br>";
        }
    } else {
        print "<span style='color:red;'>No ha indicado su nacionalidad</span><br>";
    }


    if(isset($_REQUEST['idiomas'])) {
        $idiomas = [$_REQUEST['idiomas']];
        foreach($idiomas as $indice => $valor) {
            print "Idiomas:";
            for($i=0;$i<6;$i++) {
                if(isset($valor[$i])) {
                    print " <b>$valor[$i]</b>,";
                }
            }
            print "<br>";
        }
    } else {
        print "<span style='color:red;'>No ha indicado ninguna afición</span><br>";
    }   


    $email = sanear("email");
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Dirección de correo: <b>$email</b><br>";
    } else {
        print "<span style='color:red;'>Email introducido no es válido o está vacío</span><br>";
        print "<span style='color:orange;'>Email introducido: <b>$email</b></span><br>";
    }


    $sitioWeb = sanear('sitioWeb');
    if (filter_var($sitioWeb, FILTER_VALIDATE_URL)) {
        echo "Sitio web: <a href='$sitioWeb'><b>$sitioWeb</b></a><br>";
    } else {
        print "<span style='color:red;'>Sitio Web introducido no es válido o está vacío</span><br>";
        print "<span style='color:orange;'>Sitio Web introducido: <b>$sitioWeb</b></span><br>";
    }




    print "<br><br>";
    print "<a href='ejercicio2.php'>Volver al formulario</a>";  


} else {

?>

<body>

<h1 style="text-align:center;">EJ2 - Sanear y Validar Entradas (FORMULARIO)</h1>

<form action="ejercicio2.php" method="POST">
    <fieldset>
        <legend style='border:1px solid black;'>Formulario</legend>
            <table style='border:none;'>
                <br>
                <tr>    
                    <td>
                        <b>Nombre: </b> <input type="text" name="nombre">
                        <br><br>
                    </td>
                    <td>
                        <b>Contraseña: </b> <input type="password" name="clave">
                        <br><br>
                    </td>
                </tr>
                <tr>
                    <td>
                        <b>Nivel de estudios: </b><br>
                        <input type="radio" name="estudios" value="elemental"> Certificado escolar<br>
                        <input type="radio" name="estudios" value="basico"> Graduado en E.S.O.<br>
                        <input type="radio" name="estudios" value="bachiller"> Bachiller - Formación Profesional <br>
                        <br>
                    </td>
                    <td>
                        <input type="radio" name="estudios" value="diplomado"> Diplomado<br>
                        <input type="radio" name="estudios" value="licenciado"> Licenciado o Doctorado<br>
                    </td>
                </tr>
                <tr>
                    <td>
                        <b>Nacionalidad: </b><br>
                        <input type="radio" name="nacionalidad" value="Hispana"> Hispana
                        <input type="radio" name="nacionalidad" value="Sajona"> Sajona
                        <input type="radio" name="nacionalidad" value="Otras"> Otras
                        <br><br>
                    </td>
                </tr>
                <tr>
                    <td>
                        <b>Idiomas: </b><br>
                        <input type="checkbox" name="idiomas[]" value="Ingles"> Inglés
                        <input type="checkbox" name="idiomas[]" value="Castellano"> Castellano
                        <input type="checkbox" name="idiomas[]" value="Frances"> Francés
                        <input type="checkbox" name="idiomas[]" value="Aleman"> Alemán
                        <br><br>
                    </td>
                </tr>
                <tr>
                    <td>
                        <b>Email: </b> <input type="text" name="email">
                    </td>
                    <td>
                        <b>Sitio web: </b> <input type="text" name="sitioWeb">
                    </td>
                </tr>
                <tr>
                    <td>
                        <br><br>
                        <button type="submit" name="enviar">Enviar</button>
                        <button type="resetear" name="resetear">Resetear</button>
                    </td>
                </tr>
            </table>
    </fieldset>
</form>

</body>

<?php
}
?>

</html>