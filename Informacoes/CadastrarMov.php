<?php
  include("../Banco de dados/connectDB.php");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nova Movimentação</title>
</head>
<body>
    <form method="GET">
    <p><label for="codigo_produtoId">Codigo do Produto </label><input type="text" name="codigo_produto" id="codigo_produtoId" maxlength="20" required /></p>
    <p><label for="data_">Data </label><input type='date' name="data" id="data_Id" required/></p>
    <p><label for="quantidade_Id">Quantidade </label><input type="number" name="quantidade" id="quantidade_Id"required /></p>
    <p><label for="tipo_Id">Tipo </label>
    <select name="tipo" id="tipo_id">
        <option value='E'>Entrada</option>
        <option value='S'>Saida</option>
        <option value='V'>Venda</option>
    </select> </p>
    
    <p><a href="../Telas/Produtos.php" >Voltar</a>&nbsp;&nbsp;&nbsp;<input type="submit" value="Adicionar Movimentação" /></p>
    
    <?php
        if(!$_GET)
            return;
            
        $pageWasRefreshed = isset($_SERVER['HTTP_CACHE_CONTROL']) && $_SERVER['HTTP_CACHE_CONTROL'] === 'max-age=0';
        if($pageWasRefreshed){
            header('Location: CadastrarMov.php');
        }

        $codigo = $mysqli->real_escape_string($_GET['codigo_produto']);
        $sql_code = "SELECT * FROM PRODUTOS WHERE codigo = '$codigo' ";
        $sql_query = $mysqli->query($sql_code) or die("Erro de inserção" . $mysqli->error);
        $produto = $sql_query->fetch_assoc();
        if($sql_query->num_rows != 0){

            $sql_code = "SELECT * FROM ESTOQUE WHERE codigo_produto='$codigo'";
            $sql_query = $mysqli->query($sql_code) or die("Erro de inserção" . $mysqli->error);
            $qnt = $sql_query->fetch_assoc();
            $codigo_produto = $mysqli->real_escape_string($_GET['codigo_produto']);
            $data = $mysqli->real_escape_string($_GET['data']);
            $quantidade = ($_GET['quantidade']);
            $tipo = $mysqli->real_escape_string($_GET['tipo']);

            if($qnt['qtd_estocada'] - $quantidade < 0 && ($tipo == 'S' || $tipo =='V')){
                echo "<script>
                    alert(\"Quantidade Insuficiente para a movimentação\");
                    window.location = 'CadastrarMov.php';
                </script>";
            }else{
                $sql_code = "INSERT INTO MOVIMENTACAO (codigo_produto, tipo, qtd_movimentada, data, preco) VALUES ('$codigo_produto', '$tipo', '$quantidade', '$data', ";
                if($tipo == 'S' || $tipo == 'V')
                    $sql_code .= " '${produto['preco_venda']}' )";
                else
                    $sql_code .= " '${produto['preco_custo']}' )";

                $sql_query = $mysqli->query($sql_code) or die("Erro de inserção" . $mysqli->error);
                echo "<script>
                    alert(\"Movimentação Realizada\");
                    window.location = 'CadastrarMov.php';
                </script>";
            }
        }else{
            echo "<script>
                alert(\"Produto inexistente\");
                window.location = 'CadastrarMov.php';
            </script>";
        }
    ?>
    </form>
</body>
</html>