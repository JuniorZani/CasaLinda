<?php
include("Banco de Dados/connectDB.php");
?>

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
</head>

<body>

    <?php
    include_once("screen.php");
    ?>

    <div class="container-fluid" id="panel">
        <div class="row" style="height: 10%; padding: 20px 14px;">
            <div class="col-3 d-flex align-items-center">
                <!-- style="padding: 12px 14px;" -->
                <h4 class="title" style="padding-top: 13px;">PRODUTOS</h4>
            </div>
            <div class="offset-2 col-7 d-flex align-items-center justify-content-end">
                <div class="d-flex flex-columns align-items-center justify-content-end">
                    <a class="btn add-prod text-center" href="add_product.php" data-toggle="tooltip" data-placement="top" title="Cadastrar Produtos">
                        <i class="fa-solid fa-plus fa-2xl"></i>
                    </a>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <form class="form-horizontal" method="get">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="buscar..." name="pesquisa">
                            <div class="input-group-btn">
                                <button class="btn btn-default" type="submit" data-toggle="tooltip" data-placement="top" title="Realizar Busca">
                                    <i class="fa-solid fa-magnifying-glass fa-xl"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="row table-row" style="height: 90%">
            <div class="col p-4">
                <div class="table-container table-responsive">
                    <table class="table table-borderless table-earnings">
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
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        function removerProduto(id) {
            if (confirm("Deseja remover o produto?")) {
                window.location = "infos/remove_product.php?id=" + id;
            }
        }

        function alteraProduto(id) {
            window.location = "edit_product.php?id=" + id;
        }

        $(document).ready(function() {
            $('.table-earnings').DataTable();
            $('.dataTables_length').addClass('bs-select');
        });
    </script>

</body>

</html>