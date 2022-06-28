<?php
    $sql_code = "SELECT * FROM VENDAS";

    if(isset($_POST['pesquisa'])){
    $pesquisa = $mysqli->real_escape_string($_POST['pesquisa']);
    $sql_code .= " WHERE codigo_produto LIKE '%$pesquisa%' OR nome LIKE '%$pesquisa%' 
    OR quantidade_vendida LIKE '%$pesquisa%' OR preco LIKE '%$pesquisa%' OR data_venda LIKE '%$pesquisa%'";
    }
    $sql_code .= " ORDER BY data_venda DESC";
    $sql_query = $mysqli->query($sql_code) or die("Erro de busca" . $mysqli->error);
    $qtd = $sql_query->num_rows;
    if($qtd == 0){
    echo "<tr><td colspan = '7'>Nenhuma venda encontrada</td></tr>";
    }

    while($dados = $sql_query->fetch_assoc()){
    echo " 
    <tr>
    <th>${dados['codigo_produto']}</td>
    <td>${dados['nome']}</td>
    <td>${dados['quantidade_vendida']}</td>
    <td>R$ ${dados['preco']}</td>
    <td>${dados['data_venda']}</td>
    </tr>";
    }
?>