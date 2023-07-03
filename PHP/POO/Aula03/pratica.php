<!DOCTYPE html>
<html lang="PT-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aula 03</title>
</head>

<body>
    <pre>
    <?php
       require_once 'praticaCaneta.php';
        $c1 = new Caneta;
        $c1->modelo = "Bic cristal";
        $c1->cor = "Azul";
        
        $c1->rabiscar();
        $c1->tampar();
        print_r($c1);
    ?>
    </pre>
</body>

</html>