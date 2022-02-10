<?php

// delete
 
 //$id = 1; 
 
try {
 
 //primero conexion:
  $pdo = new PDO("mysql:host=localhost;dbname=db1;charset=utf8", 'root', '');
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  //$stmt = $pdo->prepare('DELETE FROM tb1 WHERE id = :id');
  /* Caso-1: Asocio como array: Se vincula con el execute el valor en ese momento*/
 $id=1;
	print 'valor de registro al que apunta $id es '.$id;
  $stmt = $pdo->prepare('DELETE FROM tb1 WHERE id = :id');
  
  $id=2;
  print 'valor de registro al que apunta ahora $id es '.$id;
  $stmt->execute([':id'=> $id]);//se debe borrar 2 
 
	echo '<br> Filas afectadas por ek borrado es: '.$stmt->rowCount();
  
  
}
catch(PDOException $e) {
  echo 'Error: ' . $e->getMessage();
  
  
}


?>