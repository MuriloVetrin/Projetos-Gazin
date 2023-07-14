<?php
include_once "conexao.php";
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <title>Crud - trumbowyg</title>
</head>

<body>
    <a href="index.php">Listar</a><br>
    <a href="cadastrar.php">Cadastra</a><br><br>

    <h2>Listar Artigos</h2>

    <?php
        $query_artigos = "SELECT id, titulo, conteudo FROM artigos ORDER BY id DESC";
        $result_artigos = $conn->prepare($query_artigos);
        $result_artigos->execute();

        while($row_artigo = $result_artigos->fetch(PDO::FETCH_ASSOC)){
            //var_dump($row_artigo);
            extract($row_artigo);
            echo "ID: $id <br>";
            echo "Título: $titulo <br>";
            echo "Conteúdo: $conteudo <br>";
            echo "<hr>";
        }
    ?>

</body>

</html>