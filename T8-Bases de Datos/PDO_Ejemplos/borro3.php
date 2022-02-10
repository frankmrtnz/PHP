<?php

// delete
 
 $id = 4; 
 print '<br>valor de registro al que apunta $id es '.$id.'y es el que voy a vincular';
try {
 
 //primero conexion:
  $pdo = new PDO("mysql:host=localhost;dbname=db1;charset=utf8", 'root', '');
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $stmt = $pdo->prepare('DELETE FROM tb1 WHERE id = :id');

/* Caso-3 : Con bindvalue: se asigna el valor en la vble y si cambia despues no se cambia en el execute.*/


$stmt->bindValue(':id', $id); 

 $id=3;
 print '<br>Ahora Cambio el valor de registro al que apunta $id  
 pero este valor ya no se vincula al borrado'.$id;
  $stmt->execute();//se debe borrar  4;
   
  echo $stmt->rowCount(); // 1
} catch(PDOException $e) {
echo 'Error: ' . $e->getMessage();}

