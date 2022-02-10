<?php
//insercion:

try {
	//primero conexion:
  $pdo = new PDO("mysql:host=localhost;dbname=db1;charset=utf8", 'root', '');
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
 //el codigo como se autoincrementa se deja en blanco:
 
  $stmt = $pdo->prepare('INSERT INTO tb1(nombres,apellidos,localidad)  
  VALUES(:name,:apellido1,:localidad)');
  $name='David';
  $ape='Sanz';
  $loc='Mostoles';
  $stmt->execute([':name'=> $name,':apellido1'=> $ape,':localidad'=>$loc]);//--> es un array por eso se pone corchete
 
  #Filas Afectadas?
  echo '<br> Filas afectadas por la inserción: '.$stmt->rowCount(); // 1
}
 catch(PDOException $e) {
  echo 'Error: ' . $e->getMessage();
 }
 ?>
