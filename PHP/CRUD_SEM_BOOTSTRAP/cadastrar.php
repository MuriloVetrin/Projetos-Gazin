<?php
session_start();
ob_start();
include_once './conexao.php';
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD SIMPLES</title>
</head>

<body>
    <a href="index.php">Lista</a><br>

    <h1>CADASTRAR</h1>

    <?php
    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

    if (!empty($dados['CadUsuario'])) {

        $empty_input = false;

        $dados = array_map('trim', $dados);
        if (in_array("", $dados)) {
            $empty_input = true;
            echo "<p style='color: #f00; '>Necessario preencher todos os campos!</p>";
        } elseif (!filter_var($dados['email'], FILTER_VALIDATE_EMAIL)) {
            $empty_input = true;
            echo "<p style='color: #f00; '>Necessario preencher o campo com email válido!</p>";
        }

        if (!$empty_input) {
            $query_usuario = "INSERT INTO usuarios (nome, email) VALUES (:nome, :email) ";
            $cad_usuario = $conn->prepare($query_usuario);
            $cad_usuario->bindParam(':nome', $dados['nome'], PDO::PARAM_STR);
            $cad_usuario->bindParam(':email', $dados['email'], PDO::PARAM_STR);
            $cad_usuario->execute();
            if ($cad_usuario->rowCount()) {
                unset($dados);
                $_SESSION['msg'] = "<p style='color: green; '>Usuário cadastrado com sucesso!</p>";
                header("Location: index.php");
            } else {
                echo "<p style='color: #f00; '>Falha ao cadastrar usuário!</p>";
            }
        }
    }

    ?>

    <form name="cad-usuario" method="POST" action="">
        <label>Nome: </label>
        <input type="text" name="nome" id="nome" value=" <?php
                                                            if (isset($dados['nome'])) {
                                                                echo $dados['nome'];
                                                            }

                                                            ?>"><br><br>

        <label>Email: </label>
        <input type="email" name="email" id="email" value=" <?php
                                                            if (isset($dados['email'])) {
                                                                echo $dados['email'];
                                                            }

                                                            ?>"><br><br>

        <input type="submit" value="Cadastrar" name="CadUsuario">
    </form>
</body>

</html>