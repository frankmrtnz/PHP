<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EJ4-POO</title>
</head>
<body>

<?php

    class Menu {
        private $opc1='Google';
        private $opc2='Yahoo';
        private $opc3='MSN';
        
        function menuHorizontal() {
            print "<p><b>Menu Horizontal</b></p>";
            print "<p> 
                    <a href='https://www.".$this->opc1.".es' target='_blank'>".$this->opc1."</a> - 
                    <a href='https://www.".$this->opc2.".es' target='_blank'>".$this->opc2."</a> - 
                    <a href='https://www.".$this->opc3.".es' target='_blank'>".$this->opc3."</a> 
                </p>"; 
        }

        function menuVertical() {
            print "<p><b>Menu Vertical</b></p>";
            print "<p> 
                    <a href='https://www.".$this->opc1.".es' target='_blank'>".$this->opc1."</a> <br> 
                    <a href='https://www.".$this->opc2.".es' target='_blank'>".$this->opc2."</a> <br> 
                    <a href='https://www.".$this->opc3.".es' target='_blank'>".$this->opc3."</a> 
                </p>"; 
        }
    }

    
    $obj = new Menu();
    $obj->menuHorizontal();
    $obj->menuVertical();

?>

</body>
</html>