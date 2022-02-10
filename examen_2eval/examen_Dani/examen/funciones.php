<?php 

function crearComprobar(){

    try{

        $pdo = new PDO("mysql:host=localhost:3306","root","");

        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $pdo -> prepare("CREATE DATABASE IF NOT EXISTS marzo");
        $stmt->execute();

        $pdo = new PDO("mysql:host=localhost:3306;dbname=marzo","root","");

        $stmt = $pdo -> prepare("CREATE TABLE IF NOT EXISTS User (username VARCHAR(20) PRIMARY KEY, passwd VARCHAR(20) NOT NULL , email VARCHAR(20) NOT NULL )");
        $stmt->execute();

        $stmt = $pdo -> prepare("INSERT IGNORE INTO user (username, passwd, email) VALUES ('User1', 'admin1', 'user1@gmail.com'),('User2', 'admin2', 'user2@gmail.com'), ('User3', 'admin3', 'user3@gmail.com')");
        $stmt->execute();

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
}

function crearViviendas(){
    try{

        $pdo = new PDO("mysql:host=localhost:3306;dbname=marzo","root","");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $pdo -> prepare("CREATE TABLE IF NOT EXISTS viviendas ( Id INT NOT NULL AUTO_INCREMENT , Tipo VARCHAR(20) NOT NULL , Zona VARCHAR(20) NOT NULL , Direccion VARCHAR(20) NOT NULL , Dormitorios INT(20) NOT NULL DEFAULT 3 , Precio INT(20) NOT NULL , Tamano INT(20) NOT NULL , Extras VARCHAR(50) , Foto VARCHAR(30) NOT NULL , PRIMARY KEY (Id)) ENGINE = InnoDB; ");
        $stmt->execute();

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
}

function login($user, $passwd){

    try{

        $pdo = new PDO("mysql:host=localhost:3306;dbname=marzo","root","");

        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $pdo -> prepare("SELECT * FROM User");
        $stmt->execute();

        while($puntero = $stmt -> fetch(PDO::FETCH_ASSOC)){
            if($user == $puntero["username"] && $passwd == $puntero["passwd"]){
                setcookie("logged","true",time()+3600);
                return true;
            }
        }
        return false;

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

}

function comprobar(){

    if($_COOKIE["logged"]=="true"){
        return true;
    }else{
        header("Location:login.php");
    }

}

function sanear($x){

    return trim(htmlspecialchars($x,ENT_QUOTES,"UTF-8"));

}

?>