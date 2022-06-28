<?php
include("Banco de dados/connectDB.php");
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edição de Informações</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="css/edit_product_style.css">
    <link rel="icon" href="img/casa_linda_icon.png" type="image/png" sizes="16x16">
</head>

<body>

    <?php
    include_once("screen.php");
    ?>
    <div class="container-fluid" id="panel">
        <div class="row" style="height: 10%; padding-top: 20px; padding-left: 10px">
            <div class="col-5 d-flex align-items-center">
                <a class="btn back-prod text-center" href="products.php" title="Voltar para Produtos">
                    <i class="fa-solid fa-arrow-left fa-lg"></i>
                </a>
                &nbsp;&nbsp;&nbsp;
                <h4 class="title" style="padding-top: 13px;">Editar Produto</h4>
            </div>
        </div>
        <div class="row" style="height: 90%; padding-bottom: 30px">
            <div class="col-6 offset-3 d-flex justify-content-center align-items-center">
                <form method="GET" style="margin: 0 50px;">
                    <?php
                    $codigo = $mysqli->real_escape_string($_GET['id']);
                    $sql_code = "SELECT * FROM PRODUTOS WHERE codigo = '$codigo'";
                    $sql_query = $mysqli->query($sql_code) or die("Erro de Busca " . $mysqli->error);
                    $dados = $sql_query->fetch_assoc();
                    $nome = $dados['nome'];
                    $descricao = $dados['descricao'];
                    $categoria = $dados['categoria'];
                    $fornecedor = $dados['fornecedor'];
                    $preco_custo = $dados['preco_custo'];
                    $preco_venda = $dados['preco_venda'];
                    ?>


                    <div class="row form-group">
                        <div class="col-6">
                            <label for="codigoId">Código </label>
                            <input class="form-control" type="text" name="id" id="codigoId" value="<?php echo "$codigo" ?>" readonly />
                        </div>
                        <div class="col-6">
                            <label for="produtoId">Produto </label>
                            <input class="form-control" type="text" name="produto" id="produtoId" maxlength="20" list="produtoAtual" value="<?php echo "$nome" ?>" required />
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-12">
                            <label for="descricao_Id">Descrição </label>
                            <textarea class="form-control" placeholder="Até 100 Caracteres" name="descricao" id="descricao_Id" maxlength="100" cols="30" rows="3" required><?php echo "$descricao" ?></textarea>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-6">
                            <label for="categoria_Id">Categoria </label>
                            <input class="form-control" type="text" name="categoria" id="categoria_Id" maxlength="20" list="categoriaAtual" value="<?php echo "$categoria" ?>" required />
                        </div>
                        <div class="col-6">
                            <label for="preco_custo_Id">Preço de Custo </label>
                            <input class="form-control" type="number" step="0.01" min="0" name="preco_custo" id="preco_custo_Id" value="<?php echo "$preco_custo" ?>" required />
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-6">
                            <label for="fornecedor_id">Fornecedor </label>
                            <input class="form-control" type="text" name="fornecedor" id="fornecedor_Id" maxlength="20" list="fornecedorAtual" value="<?php echo "$fornecedor" ?>" required />
                        </div>
                        <div class="col-6">
                            <label for="preco_venda_Id">Preço de Venda </label>
                            <input class="form-control" type="number" step="0.01" min="0" name="preco_venda" id="preco_venda_Id" value="<?php echo "$preco_venda" ?>" required />
                        </div>
                    </div>
                    <input class="submit" type="submit" value="Alterar" />

                    <?php
                    if (!isset($_GET['produto']))
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
                    window.location = 'products.php';
                    </script>";
                    ?>
                </form>
            </div>

        </div>

    </div>
</body>

</html>