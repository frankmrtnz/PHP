<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<?php

if(isset($_REQUEST['crear'])) {
    if(isset($_REQUEST['duracion']) || $_REQUEST['duracion']!="") {
        $duracion = $_REQUEST['duracion'];
        if($duracion>=1 && $duracion<=60) {
            print "<p>Se va a crear la cookie con una duración de: $duracion segundos</p>";
            $duracionCompleta = time()+$duracion;
            setcookie("ejercicio4", "Esto es la cookie del ejercicio 4", $duracionCompleta);
            setcookie("tiempoCookie","$duracionCompleta", $duracionCompleta);
        } else {
            print "<p>La duración no está entre 1 y 60 segundos.</p>";
        }
    } else {
        print "<p>No has introducido la duración.</p>";
    }
    
}

if(isset($_REQUEST['comprobar'])) {
    if(isset($_COOKIE["ejercicio4"])) {
        print "La cookie existe y es: ". $_COOKIE["ejercicio4"];
        $duracionRestante = $_COOKIE['tiempoCookie']-time();
        print "<br> A la cookie le quedan $duracionRestante segundos.";
    } else {
        print "<p>La cookie no existe.</p>";
    }
}

if(isset($_REQUEST['destruir'])) {
    if(isset($_COOKIE["ejercicio4"])) {
        setcookie("ejercicio4");      //Con esto borramos la cookie
        print "<p>La cookie se ha destruido.</p>";
    } else {
        print "<p>La cookie no existe.</p>";
    }
}


?>


<body>
    
<h1>Creación y destrucción de cookies</h1>



<form action="#" method="POST">
    <p>Elija una opción:</p>    
    <ul>
        <li>Crear una cookie con una duración de <input type='number' name="duracion"> segundos (entre 1 y 60)
            <button type="submit" name="crear">Crear</button>
        </li>
        <li>Comprobar la cookie 
            <button type="submit" name="comprobar">Comprobar</button>
        </li>
        <li>Destruir la cookie
            <button type="submit" name="destruir">Destruir</button>
        </li>
    </ul>
</form>




</body>
</html>