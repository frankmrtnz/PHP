<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EJ1-POO2</title>
</head>
<body>
    <form action="ej1.php" method="POST">
        <fieldset>
            <legend>Datos de Usuario</legend>
            <p>
                Login: <input type="text" name="login">
                Password: <input type="password" name="password">
            </p>
            <p>
                <button type="submit" name="enviar">Enviar consulta</button>
            </p>
        </fieldset>
    </form>

<?php

    if(isset($_REQUEST['enviar'])) {

        $loginIntroducido = $_REQUEST['login'];
        $passwordIntroducido = $_REQUEST['password'];

        class Usuario {
            protected $login;
            protected $password;

            public function __construct($loginIntroducido, $passwordIntroducido) {
                $this->login = $loginIntroducido;
                $this->password = $passwordIntroducido;
            }

            public function __toString() {
                return "El login del usuario 1 es: " . $this->login . "<br>
                        El password del usuario 1 es: " . $this->password . "<br>";
            }

            public function __destruct() {
                print "he destruido el usuario introducido: ". $this->login . " y me voy";
            }
        }

    }

    $usuario1 = new Usuario($loginIntroducido, $passwordIntroducido);
    print $usuario1;

?>
</body>
</html>