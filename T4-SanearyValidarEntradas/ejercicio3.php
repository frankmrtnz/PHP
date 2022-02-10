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

    print "<h1 style='text-align:center;'>EJ3 - Sanear y Validar Entradas (RESULTADO)</h1>";
    print "<h1 style='color:blue;''>Formulario simple. Resultados del formulario</h1>";

    print "<ul>";

    $texto = sanear('texto');
    if(preg_match("/^[a-zA-Z]+[0-9]*/", $texto)) {
        print "<li>Texto de búsqueda: <b>$texto</b></li>";
    } else {
        print "<li><span style='color:red;'>Texto de búsqueda introducido no es válido o está vacío</span><br>";
        print "<span style='color:orange;'>Texto de búsqueda introducido: <b>$texto</b></span></li>";
    }


    if(isset($_REQUEST['busqueda'])) {
        $busqueda = sanear('busqueda');
        if(preg_match("/^[a-zA-Z]+[0-9]*/", $busqueda)) {
            if($busqueda == 'titulos') {
                print "<li>Buscar en: <b>Títulos de canción</b> ($busqueda)</li>";
            } else if($busqueda == 'album') {
                print "<li>Buscar en: <b>Nombres de álbum</b> ($busqueda)</li>";
            } else if($busqueda == 'ambos') {
                print "<li>Buscar en: <b>Títulos de canción y Nombres de álbum</b> ($busqueda)</li>";
            } 
        } else {
            print "<li><span style='color:orange;'>Propiedad 'value' de búsqueda está vacía o no tiene el formato correcto.</span></li>";
        }
    } else {
        print "<li><span style='color:red;'>No ha indicado su opción de 'Buscar en:'</span></li>";
    }


    if(isset($_REQUEST['genero'])) {
        $genero = sanear('genero');
        print "<li>Género: <b>$genero</b></li>";
    }

    print "</ul>";


    print "<br><br>";
    print "<a href='ejercicio3.php'>[ Nueva búsqueda ]</a>";  

} else {
?>

<body>
    
<h1 style='text-align:center;'>EJ3 - Sanear y Validar Entradas (FORMULARIO)</h1>
<h1 style="color:blue;">Formulario simple</h1>
<h2 style="font-style:oblique;">Búsqueda de canciones</h2>

<form action="ejercicio3.php" method="POST" style="border:1px dashed blue;">
    <table style="border:none;">
    <tr>
        <br>
        <td>
            <b>Texto a buscar: </b>
            <br><br>
        </td>
        <td></td>
        <td>
            <input type="text" name="texto">
            <br><br>
        </td>
    </tr>
    <tr>
        <td>
            <b>Buscar en: </b>
            <br><br>
        </td>
        <td></td>
        <td>
            <input type="radio" name="busqueda" value="titulos">Títulos de canción
            <input type="radio" name="busqueda" value="album">Nombres de álbum
            <input type="radio" name="busqueda" value="ambos">Ambos campos
            <br><br>
        </td>
    </tr>
    <tr>
        <td>
            <b>Género musical: </b>
        </td>
        <td></td>
        <td>
            <select name="genero" id="">
                <option value="Todos">Todos</option>
                <option value="Acústica">Acústica</option>
                <option value="Banda Sonora">Banda Sonora</option>
                <option value="Blues">Blues</option>
                <option value="Electrónica">Electrónica</option>
                <option value="Folk">Folk</option>
                <option value="Jazz">Jazz</option>
                <option value="New Age">New Age</option>
                <option value="Pop">Pop</option>
                <option value="Rock">Rock</option>
            </select>
        </td>
    </tr>
    <tr>
        <td>
            <br>
            <button type="submit" style="background-color:lightgray; font-size:15px;" name="enviar">Buscar</button>
        </td>
    </tr>
    </table>
</form>

</body>

<?php
}
?>

</html>