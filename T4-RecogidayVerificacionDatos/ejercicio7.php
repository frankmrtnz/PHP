<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>T4-RecogidayVerificacionDatos</title>
</head>

<?php

if(isset($_REQUEST['enviar'])) {

    print "<body style='background-color:lightblue;'>";

    print "<h1 style='text-align:right;'>TUS DATOS DE SUSCRIPCIÓN</h1>";

    if(isset($_REQUEST['nombre'])) {
        $nombre = $_REQUEST['nombre'];
        if($nombre == "") {
            print "<span style='color:red;'>No ha escrito su nombre</span><br>";
        } else {
        print "Su nombre es <b>$nombre</b><br>";
        }
    }


    if(isset($_REQUEST['apellidos'])) {
        $apellidos = $_REQUEST['apellidos'];
        if($apellidos == "") {
            print "<span style='color:red;'>No ha escrito sus apellidos</span><br>";
        } else {
        print "Sus apellidos son <b>$apellidos</b><br>";
        }
    }


    if(isset($_REQUEST['email'])) {
        $email = $_REQUEST['email'];
        if($email == "") {
            print "<span style='color:red;'>No ha escrito su email</span><br>";
        } else {
        print "Su email es <b>$email</b><bsr>";
        }
    }


    if(isset($_REQUEST['clave'])) {
        $clave = $_REQUEST['clave'];
        if($clave == "") {
            print "<span style='color:red;'>No ha escrito su contraseña</span><br>";
        } else {
        print "Contraseña: <b>$clave</b><br>";
        }
    }


    if(isset($_REQUEST['sexo'])){
        $sexo = $_REQUEST['sexo'];
        if($sexo == 'Hombre') {
            print "Sexo: <b>$sexo</b><br>";
        } else if ($sexo == 'Mujer') {
            print "Sexo: <b>$sexo</b><br>";
        } 
    } else {
        print "<span style='color:red;'>No ha indicado su sexo</span><br>";
    }


    if(isset($_REQUEST['estudios'])){
        $estudios = $_REQUEST['estudios'];
        print "Estudios: <b>$estudios</b><br>";
    } else {
        print "<span style='color:red;'>No ha indicado sus estudios</span><br>";
    }


    print "Aficiones: 'on' seleccionado, sin marcar, no seleccionado<br>";
    if(isset($_REQUEST['musica'])) {
        $musica = [$_REQUEST['musica']];
        foreach($musica as $indice => $valor) {
            print "Música: ";
            for($i=0;$i<2;$i++) {
                if(isset($valor[$i])) {
                    print "<b>$valor[$i]</b>";
                }
            }
            print "<br>";
        }
    } 
    if(isset($_REQUEST['deportes'])) {
        $deportes = [$_REQUEST['deportes']];
        foreach($deportes as $indice => $valor) {
            print "Deportes: ";
            for($i=0;$i<2;$i++) {
                if(isset($valor[$i])) {
                    print "<b>$valor[$i]</b>";
                }
            }
            print "<br>";
        }
    }  
    if(isset($_REQUEST['cine'])) {
        $cine = [$_REQUEST['cine']];
        foreach($cine as $indice => $valor) {
            print "Cine: ";
            for($i=0;$i<2;$i++) {
                if(isset($valor[$i])) {
                    print "<b>$valor[$i]</b>";
                }
            }
            print "<br>";
        }
    }
    if(isset($_REQUEST['libros'])) {
        $libros = [$_REQUEST['libros']];
        foreach($libros as $indice => $valor) {
            print "Libros: ";
            for($i=0;$i<2;$i++) {
                if(isset($valor[$i])) {
                    print "<b>$valor[$i]</b>";
                }
            }
            print "<br>";
        }
    }
    if(isset($_REQUEST['ciencia'])) {
        $ciencia = [$_REQUEST['ciencia']];
        foreach($ciencia as $indice => $valor) {
            print "Ciencia: ";
            for($i=0;$i<2;$i++) {
                if(isset($valor[$i])) {
                    print "<b>$valor[$i]</b>";
                }
            }
            print "<br>";
        }
    }
    print "<br>";


    if(isset($_REQUEST['diaSemana'])) {
        $diaSemana = $_REQUEST['diaSemana'];
        print "Día de la semana: ";
        if($diaSemana == 'Lunes') {
            print "<b>$diaSemana</b><br>";
        } else if($diaSemana == 'Martes') {
            print "<b>$diaSemana</b><br>";
        } else if($diaSemana == 'Miércoles') {
            print "<b>$diaSemana</b><br>";
        } else if($diaSemana == 'Jueves') {
            print "<b>$diaSemana</b><br>";
        } else if($diaSemana == 'Viernes') {
            print "<b>$diaSemana</b><br>";
        } else if($diaSemana == 'Sábado') {
            print "<b>$diaSemana</b><br>";
        } else if($diaSemana == 'Domingo') {
            print "<b>$diaSemana</b><br>";
        } else {
            print "<span style='color:red;'>No ha indicado ninguna edad</span><br>";
        }
    }


    if(isset($_REQUEST['comentario'])) {
        $comentario = $_REQUEST['comentario'];
        if($comentario == "") {
            print "<span style='color:red;'>No ha escrito ningún comentario</span><br>";
        } else {
        print "Comentario: <b>$comentario</b><br>";
        }
    }

    print "<br><br>";
    print "Comprueba tus datos antes de enviarlos, sino están bien vuelve a escribirlos.<br>";

    print "<br>";
    print "Los datos son correctos: ";
    print "<a href='ejercicio7b.php'>Enviar</a><br>";

    print "<br>";
    print "Los datos no son correctos: ";
    print "<a href='ejercicio7.php'>Volver a escribirlos.</a>";

    print "</body>";

} else {

?>




<body style='background-color:lightblue;'>
    <h1 style="text-align:right;">SUSCRIPCIÓN ELECTRONICA A NUESTRO BOLETÍN</h1>

    <form action="ejercicio7.php" method="POST">
        <p>
            Nombre: <input type="text" name="nombre"/>   
            Apellidos: <input type="text" name="apellidos" size="40"/>   
            E-mail: <input type="text" name="email" size="35"/>
        </p>
        <p>
            Contraseña: <input type="password" name="clave">
        </p><br/>
        <table>
        <tr>
        <td>
        Sexo:<br/>
        <input type="radio" name="sexo" value="Hombre"/> Hombre<br/>
        <input type="radio" name="sexo" value="Mujer"/> Mujer</p>
        </td>
        <td>
        Nivel de estudios:<br/>
        <input type="radio" name="estudios" value="elemental" checked="checked">
            Certificado escolar<br/>
        <input type="radio" name="estudios" value="basico"/> 
            Graduado en E.S.O.<br/>
        <input type="radio" name="estudios" value="bachiller"/> 
            Bachiller - Formación Profesional <br/>
        <input type="radio" name="estudios" value="Diplomado"/> 
            Diplomado<br/>
        <input type="radio" name="estudios" value="licenciado"/> 
            Licenciado o Doctorado<br/>
        </td>
        <td>
        Interesado en los siguientes temas: <br/>
        <input type="checkbox" name="musica"/> Música<br/>
        <input type="checkbox" name="deportes"/> Deportes<br/>
        <input type="checkbox" name="cine"/> Cine<br/>
        <input type="checkbox" name="libros"/> Libros<br/>
        <input type="checkbox" name="ciencia"/> Ciencia</p>
        </td>
        </tr>
        </table>
        <p>Día de la semana que le interesa recibirlo:</p>
        <select name="diaSemana">
            <option>Día de la semana:</option> 
            <option value="Lunes">Lunes</option> 
            <option value="Martes">Martes</option> 
            <option value="Miércoles">Miércoles</option> 
            <option value="Jueves">Jueves</option> 
            <option value="Viernes">Viernes</option> 
            <option value="Sábado">Sábado</option> 
            <option value="Domingo">Domingo</option> 
        </select>
        </p>
        <p>Su opinión: <br/>
        <textarea name="comentario" rows="5" cols="50" placeholder="Comentario: "></textarea>
        <p>
            <button type="submit" name="enviar">Enviar</button>
            <button type="reset" name="resetear">Resetear</button>
        </p>
    </form>

</body>

<?php
}
?>

</html>