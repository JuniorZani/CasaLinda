<?php
    $sql_code = "SELECT * FROM MOVIMENTACAO WHERE MONTH(data) = $mes";
    $sql_query = $mysqli->query($sql_code) OR die("Erro de Busca: " . $mysqli->error);

    $e = $s = 0;
    while($movimentacao = $sql_query->fetch_assoc()){
        if($movimentacao['tipo'] == 'E')
            $e = $e + $movimentacao['preco']*$movimentacao['qtd_movimentada'];
        if($movimentacao['tipo'] == 'S')
            $s = $s + $movimentacao['preco']*$movimentacao['qtd_movimentada'];
    }

    $lucro = (float) $s - $e;
?>