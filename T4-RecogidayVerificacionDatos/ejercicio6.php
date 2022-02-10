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

    print "<h1 style='text-align:center;'>DATOS PERSONALES 6 (RESULTADO)</h1>";
    
    if(isset($_REQUEST['nombre'])) {
        $nombre = $_REQUEST['nombre'];
        if($nombre == "") {
            print "<span style='color:red;'>No ha escrito su nombre</span><br>";
        } else {
        print "Su nombre es <b>$nombre</b><br>";
        }
    }


    if(isset($_POST['apellidos'])) {
        $apellidos = $_REQUEST['apellidos'];
        if($apellidos == "") {
            print "<span style='color:red;'>No ha escrito sus apellidos</span><br>";
        } else {
        print "Sus apellidos son <b>$apellidos</b><br>";
        }
    }


    if(isset($_REQUEST['edad'])) {
        $edad = $_REQUEST['edad'];
        if($edad == '<20') {
            print "Tiene menos de <b>20 años</b><br>";
        } else if($edad == '20-39') {
            print "Tiene entre <b>20 y 39 años</b><br>";
        } else if($edad == '40-59') {
            print "Tiene entre <b>40 y 59 años</b><br>";
        } else if($edad == '>60') {
            print "Tiene más <b>de 60 años</b><br>";
        } else {
            print "<span style='color:red;'>No ha indicado ninguna edad</span><br>";
        }
    }


    if(isset($_REQUEST['peso'])) {
        $peso = $_REQUEST['peso'];
        if($peso > 0) {
            print "Pesa <b>$peso kg</b><br>";
        } else {
            print "<span style='color:red;'>No ha indicado ningún peso</span><br>";
        }
    }


    if(isset($_REQUEST['sexo'])){
        $sexo = $_REQUEST['sexo'];
        if($sexo == 'Hombre') {
            print "Es un <b>$sexo</b><br>";
        } else if ($sexo == 'Mujer') {
            print "Es una <b>$sexo</b><br>";
        } 
    } else {
        print "<span style='color:red;'>No ha indicado su sexo</span><br>";
    }


    if(isset($_REQUEST['estadoCivil'])){
        $estadoCivil = $_REQUEST['estadoCivil'];
        if($estadoCivil == 'Soltero') {
            print "Su estado civil es <b>$estadoCivil</b><br>";
        } else if ($estadoCivil == 'Casado') {
            print "Su estado civil es <b>$estadoCivil</b><br>";
        } else if ($estadoCivil == 'Otro') {
            print "Su estado civil es <b>$estadoCivil</b> diferente a Soltero y Casado<br>";
        }
    } else {
        print "<span style='color:red;'>No ha indicado su estado civil</span><br>";
    }


    if(isset($_REQUEST['aficiones'])) {
        $aficiones = [$_REQUEST['aficiones']];
        foreach($aficiones as $indice => $valor) {
            print "Le gusta:";
            for($i=0;$i<6;$i++) {
                if(isset($valor[$i])) {
                    print " <b>$valor[$i]</b>,";
                }
            }
        }
    } else {
        print "<span style='color:red;'>No ha indicado ninguna afición</span><br>";
    }    


    print "<br>";
    print "<p><a href='ejercicio6.php'>Volver al inicio.</a></p>";

} else {
?>

<body>
    
    <h1 style='text-align:center;'>DATOS PERSONALES 6 (FORMULARIO)</h1>

    <form action="ejercicio6.php" method="POST">
    <fieldset style='border:1px solid purple;'>
    <legend style='border:1px solid purple;'>Formulario</legend>
        <p>Escriba los datos siguientes:</p>
        <table>
            <tr>
            <td>
                <label>
                <b>Nombre:</b><br>
                <input type="text" name="nombre" size="20" maxlength="20">
                </label>
            </td>
            <td>
                <label>
                <b>Apellidos:</b><br>
                <input type="text" name="apellidos" size="20" maxlength="20">
                </label>
            </td>
            <td>
                <b>Edad:</b><br>
                <select name="edad">
                <option>...</option>
                <option value="<20">Menos de 20 años</option>
                <option value="20-39">Entre 20 y 39 años</option>
                <option value="40-59">Entre 40 y 59 años</option>
                <option value=">60">60 años o más</option>
                </select>
            </td>
            </tr>
            <tr>
            <td>
                <label>
                <b>Peso:</b><br>
                <input type="number" name="peso"> kg
                </label>
            </td>
            <td>
                <b>Sexo:</b><br>
                <label><input type="radio" name="sexo" value="Hombre">Hombre</label>
                <label><input type="radio" name="sexo" value="Mujer">Mujer</label>
            </td>
            <td>
                <b>Estado Civil:</b><br>
                <label><input type="radio" name="estadoCivil" value="Soltero">Soltero</label>
                <label><input type="radio" name="estadoCivil" value="Casado">Casado</label>
                <label><input type="radio" name="estadoCivil" value="Otro">Otro</label>
            </td>
            </tr>
        </table>

        <table style="border-spacing: 5px;">
        <tbody>
            <tr>
            <td rowspan="2" class="borde"><b>Aficiones:</b></td>
            <td><label><input type="checkbox" name="aficiones[]" value="cine">Cine</label></td>
            <td><label><input type="checkbox" name="aficiones[]" value="literatura">Literatura</label></td>
            <td><label><input type="checkbox" name="aficiones[]" value="tebeos">Tebeos</label></td>
            </tr>
            <tr>
            <td><label><input type="checkbox" name="aficiones[]" value="deporte">Deporte</label></td>
            <td><label><input type="checkbox" name="aficiones[]" value="música">Música</label></td>
            <td><label><input type="checkbox" name="aficiones[]" value="televisión">Televisión</label></td>
            </tr>
        </tbody>
        </table>

        <p>
        <button type="submit" name="enviar">Enviar</button>
        <button type="reset" name="resetear">Resetear</button>
        </p>
    </fieldset>
  </form>


</body>

<?php
}
?>

<body>
    
</body>
</html>