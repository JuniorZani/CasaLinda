<?php
    $sql_code = "SELECT * FROM MOVIMENTACAO";

    if(isset($_GET['pesquisa'])){
    $pesquisa = $mysqli->real_escape_string($_GET['pesquisa']);
    $sql_code .= " WHERE codigo_produto LIKE '%$pesquisa%' 
    OR qtd_movimentada LIKE '%$pesquisa%' OR data LIKE '%$pesquisa%' OR tipo LIKE '%$pesquisa%'";
    }
    $sql_query = $mysqli->query($sql_code) or die("Erro de busca" . $mysqli->error);
    $qtd = $sql_query->num_rows;
    if($qtd == 0){
    echo "<tr><td colspan = '6'>Nenhuma movimentação encontrada</td></tr>";
    }

    while($dados = $sql_query->fetch_assoc()){
    echo " 
    <tr>
    <th>${dados['codigo']}</td>
    <td>${dados['nome']}</td>
    <td>${dados['qtd_movimentada']}</td>
    <th>${dados['tipo']}</td>
    <td>R$ ${dados['preco']}</td>
    <td>${dados['data']}</td>
    </tr>";
    }
?>