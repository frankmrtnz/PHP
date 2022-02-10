<?php
//modificacion
 $id = 1;
$name = "Manolo";
 
try {
  //primero conexion:
  $pdo = new PDO("mysql:host=localhost;dbname=db1;charset=utf8", 'root', '');
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
  $stmt = $pdo->prepare('UPDATE tb1 SET nombres = :name WHERE ID = :id');
  $stmt->execute(array(':id'   => $id,':name' => $name ));//-->Otra forma de hacer el array 
  echo '<br> Filas afectadas por la modificación es: '.$stmt->rowCount(); // 1
} catch(PDOException $e) {
echo 'Error: ' . $e->getMessage();}
?>
