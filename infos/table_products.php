<?php
    $sql_code = "SELECT * FROM PRODUTOS";

    if(isset($_GET['pesquisa'])){
        $pesquisa = $mysqli->real_escape_string($_GET['pesquisa']);
        $sql_code .= " WHERE codigo LIKE '%$pesquisa%' OR nome LIKE '%$pesquisa%' 
        OR categoria LIKE '%$pesquisa%' 
        OR fornecedor LIKE '%$pesquisa%' OR preco_custo LIKE '%$pesquisa%' 
        OR preco_venda LIKE '%$pesquisa%'";
    }
    $sql_query = $mysqli->query($sql_code) or die("Erro de busca" . $mysqli->error);
    $qtd = $sql_query->num_rows;
    if($qtd == 0){
        echo "<tr><td colspan = '8'>Nenhum produto encontrado</td></tr>";
    }
    
    while($dados = $sql_query->fetch_assoc()){
        echo " 
        <tr>
        <th scope=\"row\">${dados['codigo']}</td>
        <td>${dados['nome']}</td>
        <td>${dados['descricao']}</td>
        <td>${dados['categoria']}</td>
        <td>${dados['fornecedor']}</td>
        <td>R$ ${dados['preco_custo']}</td>
        <td>R$ ${dados['preco_venda']}</td>
        <td>&nbsp;<a onclick='alteraProduto(\"${dados['codigo']}\")' style='cursor: pointer' title=\"Editar Produto\"><i class=\"fa-solid fa-pen edit-product\"></i></a>
        &nbsp;&nbsp;
        <a onclick='removerProduto(\"${dados['codigo']}\")' style='cursor: pointer' title=\"Remover Produto\"><i class=\"fa-solid fa-xmark fa-xl remove-product\"></i></a></td>   
    </tr>";
    }
?>