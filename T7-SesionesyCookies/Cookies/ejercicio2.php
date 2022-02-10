
<?php



    if(isset($_COOKIE['ejercicio2'])) {
        //setcookie("ejercicio2");      //Con esto borramos la cookie
        setcookie("ejercicio2", $_COOKIE['ejercicio2']+1);
        print "<p>Su visita es esta página es la: " . $_COOKIE["ejercicio2"] . "</p><br>";
    } else {
        setcookie("ejercicio2", 1);
        print "<p>Es la primera vez que visita la página</p><br>";
    }


    print "<a href='ejercicio2.php'>Clic para hacer otra visita</a>";



?>
