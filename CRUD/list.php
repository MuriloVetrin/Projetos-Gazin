<?php
include_once "conexao.php";

$pagina = filter_input(INPUT_GET, "pagina", FILTER_SANITIZE_NUMBER_INT);

if (!empty($pagina)) {

    //Calcular o inicio da vizualização
    $qnt_result_pg = 5;
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
                   <td>
                      <button id='$id' class='btn btn-outline-primary btn-sm' onClick='visUsuario($id)'>Visualizar</button>

                      <button id='$id' class='btn btn-outline-warning btn-sm' onClick='editUsuarioDados($id)'>Editar</button>
                   
                      <button id='$id' class='btn btn-outline-danger btn-sm' onClick='apagarUsuarioDados($id)'>Excluir</button>
                    </td>
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

    $max_links = 2;

    $dados .= '<nav aria-label="Page navigation example"><ul class="pagination justify-content-center">';

    $dados .= "<li class='page-item'><a href='#' class='page-link' onclick='listarUsuarios(1)'>Primeiro</a></li>";

    for ($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++) {
        if ($pag_ant >= 1) {
            $dados .= "<li class='page-item'><a class='page-link' href='#' onclick='listarUsuarios($pag_ant)'>$pag_ant</a></li>";
        }
    }

    $dados .= "<li class='page-item active'><a class='page-link' href='#'>$pagina</a></li>";

    for ($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++) {
        if ($pag_dep <= $quantidade_pg) {
            $dados .= "<li class='page-item'><a class='page-link' href='#' onclick='listarUsuarios($pag_dep)'>$pag_dep</a></li>";
        }
    }

    $dados .= "<li class='page-item'><a class='page-link' href='#' onclick='listarUsuarios($quantidade_pg)'>Último</a></li>";
    $dados .=  '</ul></nav>';

    echo $dados;
} else {
    echo "<div class='alert alert-danger' role='alert'> ERRO: Nenhum usuario encontrado! </div>";
}
