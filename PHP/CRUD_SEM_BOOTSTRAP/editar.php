<?php
session_start();
ob_start();
include_once './conexao.php';

$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);

if (empty($id)) {
    $_SESSION['msg'] = "<p style='color: #f00; '>ERRO: Usuário não encontrado!</p>";
    header("Location: index.php");
    exit();
}

$query_usuario = "SELECT id, nome, email FROM usuarios WHERE id = $id LIMIT 1";
$result_usuario = $conn->prepare($query_usuario);
$result_usuario->execute();

if (($result_usuario) and ($result_usuario->rowCount() != 0)) {
    $row_usuario = $result_usuario->fetch(PDO::FETCH_ASSOC);
} else {
    $_SESSION['msg'] = "<p style='color: #f00; '>ERRO: Usuário não encontrado!</p>";
    header("Location: index.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDITAR</title>
</head>

<body>
    <a href="index.php">Voltar</a><br>

    <h1>EDITAR</h1>

    <?php

    //Receber os dados do formulario
    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

    //Validação
    if (!empty($dados['EditUsuario'])) {
        $empty_input = false;
        $dados = array_map('trim', $dados);
        if (in_array("", $dados)) {
            $empty_input = true;
            echo "<p style='color: #f00;'>Erro: Necessário preencher todos campos!</p>";
        } elseif (!filter_var($dados['email'], FILTER_VALIDATE_EMAIL)) {
            $empty_input = true;
            echo "<p style='color: #f00;'>Erro: Necessário preencher todos campos!</p>";
        }

        if (!$empty_input) {
            $query_up_usuario = "UPDATE usuarios SET nome=:nome, email=:email  WHERE id=:id";
            $edit_usuario = $conn->prepare($query_up_usuario);
            $edit_usuario->bindParam(' :nome', $dados['nome'], PDO::PARAM_STR);
            $edit_usuario->bindParam(' :email', $dados['email'], PDO::PARAM_STR);
            $edit_usuario->bindParam(' :id', $id, PDO::PARAM_INT);
            if($edit_usuario->execute()) {
                $_SESSION['msg'] = "<p style='color: green;'>Usuario editado com sucesso!</p>";
                header("Location: index.php");
            }else{
                echo "<p style='color: #f00;'>Erro: Usuario não editado com sucesso!</p>";
            }
        }
    }

    ?>

    <form id="edit-usuario" method="POST" action="">
        <label>Nome: </label><br>
        <input type="text" name="nome" id="nome" placeholder="Nome completo" value="<?php
                                                                                    if (isset($dados['nome'])) {
                                                                                        echo $dados['nome'];
                                                                                    } elseif (isset($row_usuario['nome'])) {
                                                                                        echo $row_usuario['nome'];
                                                                                    } ?>" required><br><br>

        <label>Email: </label><br>
        <input type="text" name="email" id="email" placeholder="Seu melhor email" value="<?php
                                                                                            if (isset($dados['email'])) {
                                                                                                echo $dados['email'];
                                                                                            } elseif (isset($row_usuario['email'])) {
                                                                                                echo $row_usuario['email'];
                                                                                            } ?>" required><br><br>
        <input type="submit" value="Salvar" nome="EditUsuario">
    </form>

</body>

</html>