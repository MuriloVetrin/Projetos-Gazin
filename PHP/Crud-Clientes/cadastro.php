<?php

header('Access-Control-Allow-Origin *');
header('Content-Type: application/json');

 require_once('config.php');

 $name = $_POST['name'];
 $cpf = $_POST['cpf'];
 $address = $_POST['address'];
 $phone = $_POST['telephone'];
 $email = $_POST['email'];

 $sql = "INSERT INTO clientes(name, cpf, address, telephone, email) VALUES( '".$name."', '".$cpf."', '".$address."', '".$phone."', '".$email ."')";

 $result = $connection->query($sql);
 
 if(!$result){
    http_response_code(500);
    echo json_encode(["erro" => "Erro ao inserir no banco de dados"]);
 }else{
    http_response_code(200);
    echo json_encode(["success" => "Salvo no banco de dados"]);
 }
?> 