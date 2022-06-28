<?php
    include('Banco de Dados/connectDB.php'); 
    //Vendas Mensais
    $vendas_code = "SELECT * FROM VENDAS WHERE MONTH(data_venda) = MONTH(CURRENT_DATE())";
    $vendas_query = $mysqli->query($vendas_code);
    $vendas_mensais = $vendas_query->num_rows;

    //Qntd de Produtos Cadastrados
    $produtos_code = "SELECT * FROM PRODUTOS";
    $produtos_query = $mysqli->query($produtos_code);
    $produtos_cadast = $produtos_query->num_rows;

    //Qntd de Produtos no Estoque
    $estoque_code = "SELECT * FROM ESTOQUE WHERE qtd_estocada != 0";
    $estoque_query = $mysqli->query($estoque_code);
    $estoque_num = $estoque_query->num_rows;

    //Produtos Mais Vendidos
    $prod_vendido_code = "SELECT codigo_produto,nome,sum(quantidade_vendida) from vendas group by codigo_produto order by SUM(quantidade_vendida) DESC";
    $prod_vendido_query = $mysqli->query($prod_vendido_code) or die("Erro de Produto mais vendido<br/>");
    
    //Produtos a repor
    $repor_code = "SELECT * FROM ESTOQUE WHERE qtd_estocada <= 5";
    $repor_query = $mysqli->query($repor_code) OR die("Erro de Busca". $mysqli->error);
    $repor_qntd = $repor_query->num_rows;
?>