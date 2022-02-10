<?php

// delete
 
 $id = 1; 
 
try {
 
 //primero conexion:
  $pdo = new PDO("mysql:host=localhost;dbname=db1;charset=utf8", 'root', '');
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $stmt = $pdo->prepare('DELETE FROM tb1 WHERE id = :id');

/* Caso-2 :Con bindParam: pasa una referencia de la variable (un "puntero") de manera 
	que si cambias su valor antes de un execute(), éste hará la sustitución con el valor 
	que tengan dichas variables en el instante de llamar al execute(), teniendo en cuenta
	esas últimas modificaciones.*/
 print 'valor de registro al que apunta $id es '.$id;
 $stmt->bindParam(':id', $id); 
  $id=3;
  $stmt->execute();//se debe borrar 3 como en el array;
   
  echo $stmt->rowCount(); // 1
} catch(PDOException $e) {
echo 'Error: ' . $e->getMessage();}