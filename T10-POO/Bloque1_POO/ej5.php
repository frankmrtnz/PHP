<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EJ5-POO</title>
</head>
<body>
    
    <form action="ej5.php" method="POST">
        <fieldset>
            <legend>Datos De Estilo Para El Texto</legend>
            <p>
                Título: <input type="text" name="titulo">
                Posición: <input type="text" name="posicion" placeholder="center/right/left">
            </p>
            <p>
                <button type="submit" name="enviar">Enviar consulta</button>
                <button type="reset" name="resetear">Borrar</button>
            </p>
        </fieldset>
    </form>


<?php

    if(isset($_REQUEST['enviar'])) {
        
        $tituloIntroducido = $_REQUEST['titulo'];
        $posicionIntroducida = $_REQUEST['posicion'];

        class CabeceraPagina {
            public $titulo;
            public $posicion;

            function inicializar($tituloIntroducido, $posicionIntroducida) {
                $this->titulo = $tituloIntroducido;
                $this->posicion = $posicionIntroducida;
            }

            function imprime(){
                print "<h1 style='text-align:".$this->posicion."'>".$this->titulo."</h1>";
            }
        }


        if($tituloIntroducido!="" 
            && ($posicionIntroducida=="center" || $posicionIntroducida=="right" 
                || $posicionIntroducida=="left")) {
                    $obj = new CabeceraPagina();
                    $obj->inicializar($tituloIntroducido, $posicionIntroducida);
                    $obj->imprime();
            } else {
                print "<p style='color:red;'>El campo título o el campo posición están vacíos o no tienen el formato/valores correctos.</p>";
            }
        


    }

?>

</body>
</html>