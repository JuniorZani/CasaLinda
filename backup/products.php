<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CasaLinda - Produtos</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="css/products_style.css">
    <link rel="icon" href="img/casa_linda_icon.png" type="image/png" sizes="16x16">
    <?php
        include("Banco de Dados/connectDB.php");
    ?>
</head>
<body>

    <?php   
       include_once("screen.php");
    ?>

    <div class="container-fluid" id="panel">
        <div class="row" style="height: 10%">
            <div class="col-3">
                </br>
                <h4 class="title" style="padding: 12px 14px;">PRODUTOS</h4>
            </div>
            <div class="col-6">
                <div class="col card" style="margin: 10px 0;">
                    ededeed
                </div>
            </div>
            <div class="col-3" style="height: 200px">
            </div>
        </div>
        <div class="row" style="height: 90%">
            <div class="col p-4">
                <div class="table-responsive table-container">
                    <table class="table table-borderless table" id="table_produts">
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
                                include("Informacoes/TabelaProdutos.php");
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
            </div>
        </div>
    </div>

    

    
</body>
</html>