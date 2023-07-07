<?php
session_start();
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

    <a href="cadastrar.php">Cadastrar</a><br>
    <h1>LISTA DE USUARIOS</h1>

    <?php

    if (isset($_SESSION['msg'])) {
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }

    $pagina_atual = filter_input(INPUT_GET, "page", FILTER_SANITIZE_NUMBER_INT);
    $pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;

    $limite_resultado = 2;

    $inicio = ($limite_resultado * $pagina) - $limite_resultado;

    $query_usuarios = "SELECT id, nome, email FROM usuarios ORDER BY id DESC LIMIT $inicio, $limite_resultado";
    $result_usuarios = $conn->prepare($query_usuarios);
    $result_usuarios->execute();

    if (($result_usuarios) and ($result_usuarios->rowCount() != 0)) {
        while ($row_usuario = $result_usuarios->fetch(PDO::FETCH_ASSOC)) {

            extract($row_usuario);

            echo "$nome <br><br>";
            echo "<a href='visualizar.php?id=$id'>Visualizar </a>";
            echo "<a href='editar.php?id=$id'>Editar </a><br>";
            echo "<hr>";
        }

        $query_qnt_registros = "SELECT COUNT(id) AS num_result FROM usuarios";
        $result_qnt_registros = $conn->prepare($query_qnt_registros);
        $result_qnt_registros->execute();
        $row_qnt_registros = $result_qnt_registros->fetch(PDO::FETCH_ASSOC);

        $qnt_pagina = ceil($row_qnt_registros['num_result'] / $limite_resultado);

        $maximo_link = 2;

        echo "<a href='index.php?page=1'>Primeira </a>";

        for ($pagina_anterior = $pagina - $maximo_link; $pagina_anterior <= $pagina - 1; $pagina_anterior++) {
            if ($pagina_anterior >= 1) {
                echo "<a href='index.php?page=$pagina_anterior'> $pagina_anterior </a> ";
            }
        }

        echo "$pagina";

        for ($proxima_pagina = $pagina + 1; $proxima_pagina <= $pagina + $maximo_link; $proxima_pagina++) {
            if ($proxima_pagina <= $qnt_pagina) {
                echo "<a href='index.php?page=$proxima_pagina'> $proxima_pagina </a>";
            }
        }

        echo "<a href='index.php?page=$qnt_pagina'> Última </a>";
    } else {
        echo "<p style='color: #f00; '>Erro: Nenhum usuário encontrado!</p>";
    }
    ?>
</body>

</html>