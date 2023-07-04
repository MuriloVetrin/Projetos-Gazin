<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aula 04</title>
</head>

<body>
    <pre>
    <?php
    require_once 'praticaCaneta.php';

    $c1 = new Caneta("BIC", "Azul", 0.5);
    $c2 = new Caneta("BIC", "Vermelha", 0.7);
    // $c1->setModelo("BIC");
    // $c1->setPonta(0.5);
    //print "Eu tenho uma caneta {$c1->getModelo()} de ponta {$c1->getPonta()}";

    print_r($c1);
    print_r($c2);
    ?>
    </pre>
</body>

</html>