<?php


if(isset($_SESSION['autentificado'])) {
    if($_SESSION['autentificado'] != "SI") {
        header("location: index.php");
    } else {
        session_start();
        session_destroy();
        header("location: index.php");
    }
} else {
    header("location: index.php");
}


?>