<HTML LANG="es">

<HEAD>
	<meta charset="UTF-8">
   <TITLE>Solicitud de vivenda</TITLE>
   <LINK REL="stylesheet" TYPE="text/css" HREF=" ..........">
   <style>

	.rojo{
		color:red;
	}

   </style>
	<?php 
	
	include("funciones.php");

	comprobar();

	if(isset($_REQUEST["insertar"])){

		if(!is_file('./errores/errores.txt')){
			$f = fopen("./errores/errores.txt","w+");
		}else{
			$f = fopen("./errores/errores.txt","a+");
		}

		if(!is_dir('errores')){
			mkdir('errores');
		}

		$bool = true;

		try{

			$pdo = new PDO("mysql:host=localhost:3306;dbname=marzo","root","");
	
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
			$stmt = $pdo -> prepare("SELECT * FROM viviendas");
			$stmt->execute();
	
			while($puntero = $stmt -> fetch(PDO::FETCH_ASSOC)){
				
				if (sanear($_REQUEST["direccion"])==$puntero["Direccion"]){
					print "<p class='rojo'>  La dirección ya existe</p>";
					$bool =false;
					fwrite($f,"La dirección ya existe \r\n");
				}

			}
	

		}catch(PDOException $error){
			print $error->getMessage();
	
			if(!is_dir('errores')){
				mkdir('errores');
			}
	
			if(!is_file('./errores/ficheros.txt')){
				$f = fopen("./errores/ficheros.txt","w+");
			}else{
				$f = fopen("./errores/ficheros.txt","a+");
			}
	
			fwrite($f,$error->getMessage()."\r\n");
	
			fclose($f);
		}

		if(sanear($_REQUEST["direccion"])==""){
			
			print "<p class='rojo'>La dirección esta vacía</p>";
			$bool=false;
	
			fwrite($f,"La dirección esta vacía \r\n");

		}

		if(sanear($_REQUEST["precio"])=="" || !preg_match("/^[0-9]+$/",sanear($_REQUEST["precio"]))){
			
			print "<p class='rojo'>El precio está vacío/No es numérico</p>";
			$bool=false;

			fwrite($f,"El precio está vacío/No es numérico \r\n");

		}

		if(sanear($_REQUEST["tamano"])=="" || !preg_match("/^[0-9]+$/",sanear($_REQUEST["tamano"]))){
			
			print "<p class='rojo'>El tamaño está vacío/No es numérico</p>";
			$bool=false;

			fwrite($f,"El tamaño está vacío/No es numérico \r\n");

		}

		$nombre="";

		if(!is_dir('img')){
			mkdir('img');
		}

		if(is_uploaded_file($_FILES['foto']['tmp_name']) && $bool){

			if($_FILES['foto']['error']==0){
			$nombre = "./img/".time().$_FILES['foto']['name'];

			move_uploaded_file($_FILES['foto']['tmp_name'],$nombre);



			}else{
				if(!is_file('./errores/errorImg.txt')){
					$b = fopen("./errores/errorImg.txt","w+");
				}else{
					$b = fopen("./errores/errorImg.txt","a+");
				}
		
				fwrite($b,$_FILES['foto']['error']."\r\n");
		
				fclose($b);
			}
		
		}

		fclose($f);

		if($bool){
			try{
			$pdo = new PDO("mysql:host=localhost:3306;dbname=marzo","root","");
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

				$extras="";

			if(isset($_REQUEST["extras"])){
				foreach ($_REQUEST["extras"] as $indice => $value) {
					$extras = $extras.$value." ";
				}
			}else{
				$extras="NO";
			}

	
			$stmt = $pdo -> prepare("INSERT INTO viviendas (Tipo, Zona, Direccion, Dormitorios, Precio, Tamano, Extras, Foto) VALUES ('".sanear($_REQUEST["tipo"])."','".sanear($_REQUEST["zona"])."','".sanear($_REQUEST["direccion"])."', '".sanear($_REQUEST["ndormitorios"])."', '".sanear($_REQUEST['precio'])."', '".sanear($_REQUEST["tamano"])."', '".$extras."', '".$nombre."') ");
			$stmt->execute();
		}
			catch(PDOException $error){print $error->getMessage();
				
				if(!is_dir('errores')){
					mkdir('errores');
				}

				if(!is_file('./errores/ficheros.txt')){
					$f = fopen("./errores/ficheros.txt","w+");
				}else{
					$f = fopen("./errores/ficheros.txt","a+");
				}

				fwrite($f,$error->getMessage()."\r\n");

				fclose($f);
			}	

			

			print "<p>Estos son los datos introducidos: </p>";

			print "<p>Tipo: ".sanear($_REQUEST["tipo"])."<p/>";

			print "<p>Zona: ".sanear($_REQUEST["zona"])."<p/>";

			print "<p>Dirección: ".sanear($_REQUEST["direccion"])."<p/>";

			print "<p>Número: ".sanear($_REQUEST["ndormitorios"])."<p/>";

			print "<p>Precio: ".sanear($_REQUEST["precio"])."€<p/>";

			print "<p>Tamaño: ".sanear($_REQUEST["tamano"])."<p/>";

			print "<p>Extras: ";

			if(isset($_REQUEST["extras"]))
			foreach ($_REQUEST["extras"] as $indice => $value) {
				print sanear($value)." ";
			}

			print "</p>";

			if(is_file($nombre))
			print "<a href=$nombre>Imagen<a/>";

			
		if (isset($_REQUEST["observaciones"])){
			print "<p>Observaciones: </p>".sanear($_REQUEST["observaciones"]);
		}

		print "<a href='insertar.php'>[ Insertar otra vivienda ] </a>";
		

		}else{

			print "<H1>Inserción de vivienda</H1>

			<P>Introduzca los datos de la vivienda:</P>
			
			<FORM ACTION='insertar.php' METHOD='POST' ENCTYPE='multipart/form-data'>
			
			<P><LABEL>Tipo de vivienda:</LABEL>
			<SELECT NAME='tipo'>
			
				<OPTION>Piso
				<OPTION>Adosado
				<OPTION>Chalet
				<OPTION>Casa
			
			</SELECT></P>
			
			<P><LABEL>Zona:</LABEL>
			<SELECT NAME='zona'>
			
				<OPTION>Centro
				<OPTION>Nervión
				<OPTION>Triana
				<OPTION>Aljarafe
				<OPTION>Macarena
			
			</SELECT></P>
			
			<P><LABEL>Dirección:</LABEL>
			<INPUT TYPE='TEXT' NAME='direccion'
			
			>
			</P>
			
			<P><LABEL>Número de dormitorios:</LABEL>
			
				<INPUT TYPE='radio' NAME='ndormitorios' VALUE='1'>1
				<INPUT TYPE='radio' NAME='ndormitorios' VALUE='2'>2
				<INPUT TYPE='radio' NAME='ndormitorios' VALUE='3' CHECKED>3
				<INPUT TYPE='radio' NAME='ndormitorios' VALUE='4'>4
				<INPUT TYPE='radio' NAME='ndormitorios' VALUE='5'>5
			
			</P>
			
			<P><LABEL>Precio:</LABEL>
				<INPUT TYPE='TEXT' NAME='precio'> &euro;
			</P>
			
			<P><LABEL>Tamaño:</LABEL>
				<INPUT TYPE='TEXT' NAME='tamano'
			
			> metros cuadrados
			</P>
			
			<P><LABEL>Extras (marque los que procedan):</LABEL>
			
			<INPUT TYPE='checkbox' NAME='extras[]' VALUE='Piscina'>Piscina
			<INPUT TYPE='checkbox' NAME='extras[]' VALUE='Jardín'>Jardín
			<INPUT TYPE='checkbox' NAME='extras[]' VALUE='Garaje'>Garaje
			<INPUT TYPE='checkbox' NAME='extras[]' VALUE='Sauna'>Sauna
			
			</P>
			
			<P><LABEL>Foto:</LABEL>
			
				<INPUT TYPE='FILE' NAME='foto'     value='examinar'>
			
			</P>
			
			<P><LABEL>Observaciones:</LABEL>
			<TEXTAREA NAME='observaciones' COLS='50' ROWS='5'></TEXTAREA></P>
			
			<P><INPUT TYPE='submit' NAME='insertar' VALUE='Insertar vivienda'></P>
			
			</FORM>";

		}

	}else{

	?>

</HEAD>

<BODY>


<H1>Inserción de vivienda</H1>

<P>Introduzca los datos de la vivienda:</P>

<FORM CLASS="borde" ACTION="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" METHOD="POST" ENCTYPE="multipart/form-data">

<P><LABEL>Tipo de vivienda:</LABEL>
<SELECT NAME="tipo">

	<OPTION>Piso
	<OPTION>Adosado
	<OPTION>Chalet
	<OPTION>Casa

</SELECT></P>

<P><LABEL>Zona:</LABEL>
<SELECT NAME="zona">

	<OPTION>Centro
	<OPTION>Nervión
	<OPTION>Triana
	<OPTION>Aljarafe
	<OPTION>Macarena

</SELECT></P>

<P><LABEL>Dirección:</LABEL>
<INPUT TYPE="TEXT" NAME="direccion"

>
</P>

<P><LABEL>Número de dormitorios:</LABEL>

	<INPUT TYPE='radio' NAME='ndormitorios' VALUE='1'>1
	<INPUT TYPE='radio' NAME='ndormitorios' VALUE='2'>2
	<INPUT TYPE='radio' NAME='ndormitorios' VALUE='3' CHECKED>3
	<INPUT TYPE='radio' NAME='ndormitorios' VALUE='4'>4
	<INPUT TYPE='radio' NAME='ndormitorios' VALUE='5'>5

</P>

<P><LABEL>Precio:</LABEL>
	<INPUT TYPE="TEXT" NAME="precio"

> &euro;
</P>

<P><LABEL>Tamaño:</LABEL>
	<INPUT TYPE="TEXT" NAME="tamano"

> metros cuadrados
</P>

<P><LABEL>Extras (marque los que procedan):</LABEL>

<INPUT TYPE='checkbox' NAME='extras[]' VALUE='Piscina'>Piscina
<INPUT TYPE='checkbox' NAME='extras[]' VALUE='Jardín'>Jardín
<INPUT TYPE='checkbox' NAME='extras[]' VALUE='Garaje'>Garaje
<INPUT TYPE='checkbox' NAME='extras[]' VALUE='Sauna'>Sauna

</P>

<P><LABEL>Foto:</LABEL>

	<INPUT TYPE="FILE" NAME="foto"     value='examinar'>

</P>

<P><LABEL>Observaciones:</LABEL>
<TEXTAREA NAME="observaciones" COLS="50" ROWS="5"></TEXTAREA></P>

<P><INPUT TYPE="submit" NAME="insertar" VALUE="Insertar vivienda"></P>

</FORM>

<a href="operaciones.php">[ Volver ]</a>


</BODY>

<?php } ?>
</HTML>
