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

        $p1 = new ContaBanco();
        $p2 = new ContaBanco();

        $p1->abrirConta("CC");
        $p1->setDono("Luke");
        $p1->setNumConta(1977);

        $p2->abrirConta("CP");
        $p2->setDono("Leia");
        $p2->setNumConta(1980);

        $p1->depositar(300);
        $p2->depositar(500);

        //$p2->sacar(100);
        //$p2->sacar(1000);

        $p1->pagarMensal();
        $p2->pagarMensal();

        //Para fechar a conta deles
        //$p1->sacar(338);
        //$p2->sacar(630);
        //$p1->fecharConta();
        //$p2->fecharConta();

        print_r($p1);
        print_r($p2);
        ?>
    </pre>
</body>

</html>