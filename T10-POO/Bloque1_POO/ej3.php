<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EJ3-POO</title>
</head>
<body>
    <form action="ej3.php" method="POST">
        <fieldset>
            <legend>Datos</legend>
            <p>
                <table>
                    <tr>
                        <td>Día:</td>
                        <td>Mes:</td>
                        <td>Año:</td>
                    </tr>
                    <tr>
                        <td><input type="text" name="dia" placeholder="Del 01 al 31 (DD)"></td>
                        <td><input type="text" name="mes" placeholder="Del 01 al 12 (MM)"></td>
                        <td><input type="text" name="anio" placeholder="Del 1900 al 2099 (AAAA)"></td>
                    </tr>
                </table>
            </p>
            <p>
                <button type="submit" name="enviar">Enviar consulta</button>
                <br>
                <button type="reset" name="resetear">Borrar</button>
            </p>
        </fieldset>
    </form>

<?php

    if (isset($_REQUEST['enviar'])) {

        $diaIntroducido = $_REQUEST['dia'];
        $mesIntroducido = $_REQUEST['mes'];
        $anioIntroducido = $_REQUEST['anio'];
        $patronDia = "/0[1-9]|[12][0-9]|3[01]/";
        $patronMes = "/0[1-9]|1[012]/";
        $patronAnio = "/(19|20)[0-9]{2}/";



        class Fecha {
            private $dia;
            private $mes;
            private $anio;

            function inicializar($diaIntroducido, $mesIntroducido, $anioIntroducido) {
                $this->dia = $diaIntroducido;
                $this->mes = $mesIntroducido;
                $this->anio = $anioIntroducido;
            }

            function imprime() {
                print "La fecha es ".$this->dia." / ".$this->mes." / ".$this->anio;
            }
        }

        if(preg_match($patronDia, $diaIntroducido) && preg_match($patronMes, $mesIntroducido) && preg_match($patronAnio, $anioIntroducido)) {
            $obj = new Fecha();
            $obj->inicializar($diaIntroducido, $mesIntroducido, $anioIntroducido);
            $obj->imprime();
        } else {
            print "<p style='color:red;'>El formato fecha no es el correcto DD/MM/AAAA</p>";
        }
        

    }

?>

</body>
</html>