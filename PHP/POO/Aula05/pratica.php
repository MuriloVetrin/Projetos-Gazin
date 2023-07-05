<!DOCTYPE html>
<html lang="PT-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aula 05</title>
</head>

<body>
    <pre>
    <?php
    require_once 'praticaBanco.php';

    $c1 = new ContaBanco("BIC", "Azul", 0.5);
    
    print_r($c1);
    ?>
    </pre>
</body>

</html>