<?php
include_once "conexao.php";
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="imagens/favicon.ico">
    <link rel="stylesheet" href="dist/ui/trumbowyg.min.css">
    <link rel="stylesheet" href="dist/plugins/emoji/ui/trumbowyg.emoji.min.css">

    <title>Celke - Cadastrar Artigo</title>
</head>

<body>
    <a href="index.php">Listar</a><br>
    <a href="cadastrar.php">Cadastra</a><br><br>

    <h1>Cadastra Artigo</h1>

    <?php
    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    

    if(!empty($dados['SendCadArtigo'])){
        //var_dump($dados);
        $query_cad_artigo = "INSERT INTO artigos (titulo, conteudo) VALUES (:titulo, :conteudo)";
        $cad_artigo = $conn->prepare($query_cad_artigo);
        $cad_artigo->bindParam(':titulo', $dados['titulo']);
        $cad_artigo->bindParam(':conteudo', $dados['conteudo']);
        $cad_artigo->execute();

        if($cad_artigo->rowCount()){
            echo "<p style='color: green;'>Artigo cadastrado com sucesso!</p>";
        }else{
            echo "<p style='color: #f00;'>Erro: Artigo não cadastrado com sucesso!</p>";
        }
    }
    ?>

    <form method="POST" action="">
        <label>Título</label>
        <input type="text" name="titulo" id="titulo" placeholder="Título artigo" /><br><br>

        <label>Conteúdo</label>
        <textarea name="conteudo" id="trumbowyg-editor" rows="5" placeholder="Conteúdo do artigo"></textarea><br><br>

        <input type="submit" value="Cadastrar" name="SendCadArtigo" />
    </form>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script src="dist/trumbowyg.min.js"></script>

    <script type="text/javascript" src="dist/langs/pt_br.min.js"></script>

    <script src="dist/plugins/emoji/trumbowyg.emoji.min.js"></script>

    <script>
        $('#trumbowyg-editor').trumbowyg({
            lang: 'pt_br',
            btns: [
                ['viewHTML'],
                ['undo', 'redo'], // Only supported in Blink browsers
                ['formatting'],
                ['strong', 'em', 'del'],
                ['superscript', 'subscript'],
                ['link'],
                ['insertImage'],
                ['justifyLeft', 'justifyCenter', 'justifyRight', 'justifyFull'],
                ['unorderedList', 'orderedList'],
                ['horizontalRule'],
                ['removeformat'],
                ['fullscreen'],
                ['emoji']
            ],
            autogrow: true
        });
    </script>
</body>

</html>