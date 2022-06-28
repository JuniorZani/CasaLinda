<?php
$sql_code = 'SELECT * FROM VENDAS';
$sql_query = $mysqli->query($sql_code) OR die('Erro de Acesso de Vendas' . $mysqli->error);

if(isset($_GET['mes'])){
    $mes = $mysqli->real_escape_string($_GET['mes']);
    $sql_code .= " WHERE MONTH(data_venda) = $mes";
}

    $sql_query = $mysqli->query($sql_code) or die("Erro de busca" . $mysqli->error);
    $qtd = $sql_query->num_rows;
    if($qtd == 0){
        echo "<tr><td colspan = '5'>Nenhuma venda encontrada</td></tr>";
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