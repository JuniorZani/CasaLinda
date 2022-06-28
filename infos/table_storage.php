<?php
    $sql_code = "SELECT * FROM ESTOQUE";

    if(isset($_POST['pesquisa'])){
    $pesquisa = $mysqli->real_escape_string($_POST['pesquisa']);
    $sql_code .= " WHERE codigo_produto LIKE '%$pesquisa%' OR nome_produto LIKE '%$pesquisa%' 
    OR qtd_estocada LIKE '%$pesquisa%'";
    }
    $sql_query = $mysqli->query($sql_code) or die("Erro de busca" . $mysqli->error);
    $qtd = $sql_query->num_rows;
    if($qtd == 0){
    echo "<tr><td colspan = '7'>Nenhum produto encontrado</td></tr>";
    }

    while($dados = $sql_query->fetch_assoc()){
    echo " 
    <tr>
    <th>${dados['codigo_produto']}</td>
    <td>${dados['nome_produto']}</td>
    <td>${dados['qtd_estocada']}</td>
    </tr>";
    }
?>