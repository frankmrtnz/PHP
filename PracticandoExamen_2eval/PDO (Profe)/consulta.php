<?php
//SELECT SIN PARAMETROS:
try {
		//primero conexion:
		  $pdo = new PDO("mysql:host=localhost;dbname=db1;charset=utf8", 'root', '');
		  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		  
				# Para ejecutar la consulta SELECT si no tenemos parámetros 
				#en la consulta podremos usar ->query() AUNQUE SE ACONSEJA CONSULTAS SIEMPRE PREPARADAS
				
			$stmt = $pdo->query('SELECT * from tb1');
			
			# Indicamos en qué formato queremos obtener los datos de la tabla , en este caso es en formato de array asociativo.
			# Si no indicamos nada por defecto se usará FETCH_BOTH lo que nos permitirá acceder
			#como un array asociativo o array numérico.
			
			$stmt->setFetchMode(PDO::FETCH_ASSOC);// esto tb se puede pner en el argumento del fetch directamente

			# Leemos los datos del registro con el método ->fetch() 
			echo '<h1>Ejecución cosulta NO preparada</h1>';
			while ($row = $stmt->fetch()) {
				echo $row['nombres'] . "<br/>";//distingue mayusculas de minúsculas
				echo $row['apellidos'] . "<br/>";
				echo $row['localidad'] . "<br/>";
			}
			echo '<br> Filas afectadas por la consulta es: '.$stmt->rowCount();
			# Para liberar los recursos utilizados en la consulta SELECT
			
			$stmt = null;
} catch (PDOException $err) {
	
    // Mostramos un mensaje genérico de error.
	echo "Error: ejecutando consulta SQL.";
}
//con consulta preparda:


try {
		//primero conexion:
		  $pdo = new PDO("mysql:host=localhost;dbname=db1;charset=utf8", 'root', '');
		  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		  
				# Para ejecutar la consulta SELECT si no tenemos parámetros 
				#en la consulta podremos usar ->query() AUNQUE SE ACONSEJA CONSULTAS SIEMPRE PREPARADAS
				
			$stmt = $pdo->prepare('SELECT * from tb1');
			$stmt->execute();
			
			# Indicamos en qué formato queremos obtener los datos de la tabla , en este caso es en formato de array asociativo.
			# Si no indicamos nada por defecto se usará FETCH_BOTH lo que nos permitirá acceder
			#como un array asociativo o array numérico.
			
			$stmt->setFetchMode(PDO::FETCH_ASSOC);// esto tb se puede pner en el argumento del fetch directamente

			# Leemos los datos del registro con el método ->fetch() 
			echo '<h1>Ejecución cosulta preparada</h1>';
			while ($row = $stmt->fetch()) {
				echo $row['nombres'] . "<br/>";//distingue mayusculas de minúsculas
				echo $row['apellidos'] . "<br/>";
				echo $row['localidad'] . "<br/>";
			}
			echo '<br> Filas afectadas por la consulta es: '.$stmt->rowCount();
			# Para liberar los recursos utilizados en la consulta SELECT
			
			$stmt = null;
} catch (PDOException $err) {
	
    // Mostramos un mensaje genérico de error.
	echo "Error: ejecutando consulta SQL.";
}