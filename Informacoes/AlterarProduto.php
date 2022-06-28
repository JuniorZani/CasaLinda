<?php
  include("../Banco de dados/connectDB.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edição de Informações</title>
    <!-- <link rel="stylesheet" type="text/css" href="style.css" /> -->
    
</head>
<body>
<form method="GET">

<?php
    $codigo = $mysqli->real_escape_string($_GET['id']);
?>  
        <table border ="1" >
        <th>Código</th>
        <th>Produto</th>
        <th>Descrição</th>
        <th>Categoria</th>
        <th>Fornecedor</th>
        <th>Preço de Venda</th>
        <th>Preço de Custo</th>

        <?php
            $sql_code = "SELECT * FROM PRODUTOS WHERE codigo = '$codigo'";
            $sql_query = $mysqli->query($sql_code) or die("Erro de Busca " . $mysqli->error);
            
            $dados = $sql_query->fetch_assoc();
                echo "<tr>
                <td>${dados['codigo']}</td>
                <td>${dados['nome']}</td>
                <td>${dados['descricao']}</td>
                <td>${dados['categoria']}</td>
                <td>${dados['fornecedor']}</td>
                <td>${dados['preco_custo']} </td>
                <td>${dados['preco_venda']} </td>
            </tr>";

            $nome = $dados['nome'];
            $descricao = $dados['descricao'];
                ?>
                    <datalist id="produtoAtual">
                        <option value= "<?php echo "${dados['nome']}" ?>" ></option>
                    </datalist>
                    <datalist id="descricaoAtual">
                        <option value= "<?php echo "${dados['descricao']}" ?>" ></option>
                    </datalist>
                    <datalist id="categoriaAtual">
                        <option value= "<?php echo "${dados['categoria']}" ?>" ></option>
                    </datalist>
                    <datalist id="fornecedorAtual">
                        <option value= "<?php echo "${dados['fornecedor']}" ?>" ></option>
                    </datalist>
                    <datalist id="preco_custoAtual">
                        <option value= "<?php echo "${dados['preco_custo']}" ?>" ></option>
                    </datalist>
                    <datalist id="preco_vendaAtual">
                        <option value= "<?php echo "${dados['preco_venda']}" ?>" ></option>
                    </datalist>
    <?php

        ?>

    </table>

    <p><label for="codigoId">Código </label><input type="text" name="id" id="codigoId" value="<?php echo "$codigo" ?>" readonly /></p>
    <p><label for="produtoId">Produto </label><input type="text" name="produto" id="produtoId" maxlength="20" value="<?php echo "$nome" ?>" required /></p>

    <p><label for="descricao_Id">Descrição </label><br/><textarea placeholder="Até 100 Caracteres" name="descricao" id="descricao_Id" maxlength="100" cols="30" rows="3" list="descricaoAtual" required></textarea></p>
    <p><label for="categoria_Id">Categoria </label><input type="text" name="categoria" id="categoria_Id" maxlength="20" list="categoriaAtual" required /></p>
    <p><label for="fornecedor_id">Fornecedor </label><input type="text" name="fornecedor" id="fornecedor_Id" maxlength="20" list="fornecedorAtual" required /></p>
    <p><label for="preco_custo_Id">Preco de Custo </label><input type="text" name="preco_custo" id="preco_custo_Id" placeholder="Valor separado por ponto" list="preco_custoAtual" required /> </p>
    <p><label for="preco_venda_Id">Preço de Venda </label><input type="text" name="preco_venda" id="preci_venda_Id" placeholder="Valor separado por ponto" list="preco_vendaAtual" required /></p>
    
    <p><a href="../Telas/Produtos.php" >Retornar Para Lista de Produtos</a>&nbsp;&nbsp;&nbsp;<input type="submit" value="Alterar"/></p>
    


    <?php
        if(!isset($_GET['produto']))
            return;

        $nome = $mysqli->real_escape_string($_GET['produto']);
        $descricao = $mysqli->real_escape_string($_GET['descricao']);
        $categoria = $mysqli->real_escape_string($_GET['categoria']);
        $fornecedor = $mysqli->real_escape_string($_GET['fornecedor']);
        $preco_custo = floatval($mysqli->real_escape_string($_GET['preco_custo']));
        $preco_venda = floatval($mysqli->real_escape_string($_GET['preco_venda']));

        $sql_code = "UPDATE PRODUTOS SET
            nome = '$nome',
            descricao = '$descricao',
            categoria = '$categoria',
            fornecedor = '$fornecedor',
            preco_custo = '$preco_custo',
            preco_venda = '$preco_venda'
        WHERE codigo = '$codigo' ";
        $sql_query = $mysqli->query($sql_code) or die("Erro de inserção" . $mysqli->error);
        echo "<script>
            alert(\"Alteração realizada\");
            window.location = 'AlterarProduto.php';
        </script>";

    ?>
    </form>
</body>
</html>