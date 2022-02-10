<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio6</title>
</head>
<body>
    
<?php
        
        $dado1 = rand(1,6);

        print "<p>Actualice la página para mostrar una nueva tirada</p>\n";
        print "<p> <img src=img/$dado1.svg  width=300px height=300px>";

        print   "<table>
                    <tr>
                        <td style=\"border: black 1px solid; padding: 44px;\">1</td>
                        <td style=\"border: black 1px solid; padding: 44px;\">2</td>
                        <td style=\"border: black 1px solid; padding: 44px;\">3</td>
                        <td style=\"border: black 1px solid; padding: 44px;\">4</td>
                        <td style=\"border: black 1px solid; padding: 44px;\">5</td>
                        <td style=\"border: black 1px solid; padding: 44px;\">6</td>
                    </tr>
                </table>";

        print "<svg width='1000' height='1000'>\n";
        print "<circle cx=\"" . (100 * $dado1 - 50) . "\" cy='35' r='30' stroke='black' fill='red' />\n";
        print "</svg>";

?>

</body>
</html>