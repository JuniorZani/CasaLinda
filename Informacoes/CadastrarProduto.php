<?php
  include("../Banco de dados/connectDB.php");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Produtos</title>
</head>
<body>
    <form method="GET">
    <p><label for="codigo_Id">Codigo </label><input type="text" name="codigo" id="codigo_Id" maxlength="4" required /></p>
    <p><label for="produtoId">Produto </label><input type="text" name="produto" id="produtoId" maxlength="20" required /></p>
    <p><label for="descricao_Id">Descrição </label><br/><textarea placeholder="Até 100 Caracteres" name="descricao" id="descricao_Id" maxlength="100" cols="30" rows="3" list="descricaoAtual" required></textarea></p>
    <p><label for="categoria_Id">Categoria </label><input type="text" name="categoria" id="categoria_Id" maxlength="20" required /></p>
    <p><label for="fornecedor_id">Fornecedor </label><input type="text" name="fornecedor" id="fornecedor_Id" maxlength="20" required /></p>
    <p><label for="preco_custo_Id">Preco de Custo </label><input type="text" name="preco_custo" id="preco_custo_Id" placeholder="Valor separado por ponto" required /> </p>
    <p><label for="preco_venda_Id">Preço de Venda </label><input type="text" name="preco_venda" id="preci_venda_Id" placeholder="Valor separado por ponto" required /></p>
    
    <p><a href="../Telas/Produtos.php" >Voltar</a>&nbsp;&nbsp;&nbsp;<input type="submit" value="Cadastrar"/></p>
    
    <?php
        if(!$_GET)
            return;
        
        $codigo = $mysqli->real_escape_string($_GET['codigo']);

        $sql_code = "SELECT * FROM PRODUTOS WHERE codigo = '$codigo' ";
        $sql_query = $mysqli->query($sql_code) or die("Erro de inserção" . $mysqli->error);

        if($sql_query->num_rows == 0){
            $nome = $mysqli->real_escape_string($_GET['produto']);
            $descricao = $mysqli->real_escape_string($_GET['descricao']);
            $categoria = $mysqli->real_escape_string($_GET['categoria']);
            $fornecedor = $mysqli->real_escape_string($_GET['fornecedor']);
            $preco_custo = floatval($mysqli->real_escape_string($_GET['preco_custo']));
            $preco_venda = floatval($mysqli->real_escape_string($_GET['preco_venda']));

            $sql_code = "INSERT INTO PRODUTOS VALUES ('$codigo', '$nome', '$descricao', '$categoria', '$fornecedor', '$preco_custo', '$preco_venda')";

            $sql_query = $mysqli->query($sql_code) or die("Erro de inserção" . $mysqli->error);
            echo "<script>
                alert(\"Produto Adicionado\");
                window.location = 'CadastrarProduto.php';
            </script>";
        }else{
            echo "<script>
                alert(\"Codigo já existente\");
                window.location = 'CadastrarProduto.php';
            </script>";
        }
    ?>
    </form>
</body>
</html>