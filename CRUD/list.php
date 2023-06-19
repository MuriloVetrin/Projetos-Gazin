<?php
include_once "conexao.php";

$pagina = filter_input(INPUT_GET, "pagina", FILTER_SANITIZE_NUMBER_INT);

if (!empty($pagina)) {

    //Calcular o inicio da vizualização
    $qnt_result_pg = 10;
    $inicio = ($pagina * $qnt_result_pg) - $qnt_result_pg;

    $query_usuarios = "SELECT id, nome, email From usuarios ORDER BY id DESC LIMIT $inicio, $qnt_result_pg";
    $result_usuarios = $conn->prepare($query_usuarios);
    $result_usuarios->execute();

    $dados = "<div class='table-responsive'>
                <table class='table table-striped table-bordered'>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>E-mail</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                <tbody>";

    while ($row_usuario = $result_usuarios->fetch(PDO::FETCH_ASSOC)) {
        extract($row_usuario);
        $dados .= "<tr>
                   <td>$id</td>
                   <td>$nome</td>
                   <td>$email</td>
                   <td>Ações - $pagina</td>
               </tr>";
    }

    $dados .= "</tbody>
           </table>
           </div>";

    //Somar a qtd de usuarios
    $query_pg = "SELECT COUNT(id) AS num_result FROM usuarios";
    $result_pg = $conn->prepare($query_pg);
    $result_pg->execute();
    $row_pq = $result_pg->fetch(PDO::FETCH_ASSOC);

    //Quantidade de pagina
    $quantidade_pg = ceil($row_pq['num_result'] / $qnt_result_pg);

            $dados .= '<nav aria-label="Page navigation example"><ul class="pagination justify-content-center">';
            //erro aqui minuto 25:25  video 2
            $dados .= "<li class='page-item disabled'><a class='page-link' href='#' onclick='listarUsuarios($quantidade_pg)'>Anterior</a></li>";

            $dados .= '<li class="page-item"><a class="page-link" href="#">1</a></li>';
        
            $dados .= "<li class='page-item'><a class='page-link' href='#'>$pagina</a></li>";
        
            $dados .= '<li class="page-item"><a class="page-link" href="#">3</a></li>';
            $dados .= "<li class='page-item'><a class='page-link' href='#' onclick='listarUsuarios($quantidade_pg)'>Próximo</a></li>";              
            $dados .=  '</ul></nav>';

    echo $dados;
} else {
    echo "<div class='alert alert-danger' role='alert'> ERRO: Nenhum usuario encontrado! </div>";
}
