<?php
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
    <h1>CADASTRAR</h1>

    <?php
    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

    if (!empty($dados['CadUsuario'])) {
        
        $query_usuario = "INSERT INTO usuarios (nome, email) VALUES (:nome, :email) ";
        $cad_usuario = $conn->prepare($query_usuario);
        $cad_usuario->bindParam(':nome', $dados['nome'], PDO::PARAM_STR);
        $cad_usuario->bindParam(':email', $dados['email'], PDO::PARAM_STR);
        $cad_usuario->execute();
        if($cad_usuario->rowCount()) {
            echo "<p style='color: green; '>Usuário cadastrado com sucesso!</p>";
        }else{
            echo "<p style='color: #f00; '>Falha ao cadastrar usuário!</p>";
        }
    }

    ?>

    <form name="cad-usuario" method="POST" action="">
        <label>Nome: </label>
        <input type="text" name="nome" id="nome" placeholder="Nome completo" require><br><br>

        <label>Email: </label>
        <input type="email" name="email" id="email" placeholder="Seu melhor e-mail" require><br><br>

        <input type="submit" value="Cadastrar" name="CadUsuario">
    </form>
</body>

</html>