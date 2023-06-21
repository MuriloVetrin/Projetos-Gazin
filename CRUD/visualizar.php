<?php
include_once "conexao.php";

$id= filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);

if (!empty($id)) {

    $query_usuario = "SELECT id, nome, email FROM usuarios WHERE id =:id LIMIT 1";
    $result_usuario = $conn->prepare($query_usuario);
    $result_usuario->bindParam(':id', $id);
    $result_usuario->execute();

    $row_usuario = $result_usuario->fetch(PDO::FETCH_ASSOC);
 
    $retorna = ['erro' => false, 'dados' => $row_usuario];
} else {

    $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'> Erro: Usuário não cadastrado! </div>"];
}

echo json_encode($retorna);
