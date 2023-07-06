<?php

$host = "localhost";
$user = "root";
$pass = "";
$dbname = "crudphpsb";
$port = 3306;

try{
    $conn = new PDO("mysql:host=$host;port=$port;dbname=" . $dbname, $user,$pass);

    //echo "Conexão com o  banco foi um sucesso";
} catch(PDOException $err){
    echo "Erro: Conexão com o banco não deu certo" . $err->getMessage();
}