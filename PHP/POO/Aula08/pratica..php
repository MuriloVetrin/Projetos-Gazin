<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aula08</title>
</head>

<body>
  <pre>
    <?php 
    require_once 'Lutador.php';
    require_once 'Luta.php';

    $l = array();

    $l[0] = new Lutador("Pretty Boy", "França", 30, 1.75, 68.9, 11, 2, 1);
    $l[1] = new Lutador("Putscript", "Brasil", 29, 1.68, 57.8, 14, 2, 3);
    $l[2] = new Lutador("SnapShadow", "EUA", 35, 1.70, 84.6, 12, 2, 3);
    $l[3] = new Lutador("Dead Code", "Austrália", 28, 1.93, 81.6, 13, 0, 2);
    $l[4] = new Lutador("UFOCobal", "Brasil", 37, 1.70, 119.3, 5, 4, 3);
    $l[5] = new Lutador("Nerdaart", "EUA", 30, 1.81, 105.7, 12, 2, 4);


    $UFC01 = new Luta();
    $UFC01->marcarLuta($l[0], $l[1]);
    $UFC01->lutar();
    ?>
   </pre>
</body>

</html>