<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="css/test_style.css">
    <?php
        include("Banco de Dados/connectDB.php");
    ?>
</head>
<body>
    <div class="table-wrapper">
        <table class="table table-earnings">
            <thead>
                <tr>
                    <th scope="col">Código</th>
                    <th scope="col">Produto</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Categoria</th>
                    <th scope="col">Fornecedor</th>
                    <th scope="col">Preço Compra</th>
                    <th scope="col">Preço Venda</th>
                    <th scope="col">Opções</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    include("infos/table_products.php");
                ?>
                <tr>
                    <th scope="row">1000</th>
                    <td>Abajur</td>
                    <td>Limpo queeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeee</td>
                    <td>Quarto</td>
                    <td>TokStok</td>
                    <td>150</td>
                    <td>170</td>
                    <td></td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td colspan="1">Larry the Bird</td>
                    <td>Zezezeed</td>
                    <td>@twitter</td>
                    <td>TokStok</td>
                    <td>150</td>
                    <td>170</td>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>