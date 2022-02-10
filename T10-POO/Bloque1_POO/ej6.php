<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EJ6-POO</title>
</head>
<body>
    
    <form action="ej6.php" method="POST">
        <fieldset>
            <legend>Datos De Estilo Para El Texto</legend>
            <p>
                Título: <input type="text" name="titulo">
                Posición: <input type="text" name="posicion" placeholder="center/right/left">
                Color Letra: <input type="text" name="colorLetra">
                Color Fondo: <input type="text" name="colorFondo">
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
        $colorLetraIntroducido = $_REQUEST['colorLetra'];
        $colorFondoIntroducido = $_REQUEST['colorFondo'];

        class CabeceraPagina {
            public $titulo;
            private $posicion;
            private $colorLetra;
            private $colorFondo;

            function inicializar($tituloIntroducido, $posicionIntroducida, $colorLetraIntroducido, $colorFondoIntroducido) {
                $this->titulo = $tituloIntroducido;
                $this->posicion = $posicionIntroducida;
                $this->colorLetra = $colorLetraIntroducido;
                $this->colorFondo = $colorFondoIntroducido;
            }

            function imprime(){
                print "<h1 style='text-align:".$this->posicion."; 
                            color:".$this->colorLetra."; 
                            background-color:".$this->colorFondo."'>
                                ".$this->titulo."
                        </h1>";
            }
        }


        if($tituloIntroducido!="" 
            && ($posicionIntroducida=="center" || $posicionIntroducida=="right" 
                || $posicionIntroducida=="left") 
            && $colorLetraIntroducido!="" && $colorFondoIntroducido!="") {
                    $obj = new CabeceraPagina();
                    $obj->inicializar($tituloIntroducido, $posicionIntroducida, $colorLetraIntroducido, $colorFondoIntroducido);
                    $obj->imprime();
            } else {
                print "<p style='color:red;'>El campo título, campo posición, campo color Letra o el campo color Fondo están vacíos o no tienen el formato/valores correctos.</p>";
            }
        


    }

?>

</body>
</html>