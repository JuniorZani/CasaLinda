<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CasaLinda - Produtos</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="css/storage_style.css">
    <link rel="icon" href="img/casa_linda_icon.png" type="image/png" sizes="16x16">
    <?php
    include("Banco de Dados/connectDB.php");
    include('dashboard_info.php');

    $prod_mais_vendido = $prod_vendido_query->fetch_assoc();

    ?>
</head>

<body>
    <div class="container-fluid" id="panel">
        <div class="row" style="height: 10%; padding: 20px 14px;">
            <div class="col-3 d-flex align-items-center">
                <!-- style="padding: 12px 14px;" -->
                <h4 class="title" style="padding-top: 13px;">ESTOQUE</h4>
            </div>
            <div class="offset-2 col-7 d-flex align-items-center justify-content-end">
                <div class="d-flex flex-columns align-items-center justify-content-end">
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <form class="form-horizontal" method="post">
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
            <div class="col-5 p-4">
                <div class="row pb-3" style="height: 30%">
                    <div class="col-6">
                        <div class="card h-100 d-flex justify-content-center align-items-center text-center">
                            <h5 class="card-title" style="padding-left: 5px; padding-right: 5px">Quantidade em Estoque</h5>
                            <?php
                                echo "<h1 class=\"card-text\">$estoque_num</h1>";
                            ?>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="card h-100 d-flex justify-content-center align-items-center text-center">
                            <h5 class="card-title">Produto mais Vendido</h5>
                            <?php
                                echo "<h2 class=\"card-text\">${prod_mais_vendido['nome']}</h2>";
                            ?>
                        </div>
                    </div>
                </div>
                <div class="row" style="height: 70%">
                    <div class="col-12">
                        <div class="card card-prod-restock h-100 overflow-auto d-flex justify-content-start">
                            <div class="d-flex justify-content-between">
                                <h5 class="card-title">Produtos à Repor</h5>
                                <?php
                                    echo "<h1 class=\"card-text\">$repor_qntd</h1>";
                                ?>
                            </div>
                            <ul>
                                <?php
                                    while($repor = $repor_query->fetch_assoc())
                                        echo "<li>${repor['nome_produto']}</li>";
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-7 p-4">
                <div class="table-container table-responsive">
                    <table class="table table-borderless table-earnings align-middle">
                        <thead>
                            <tr>
                                <th scope="col">Código</th>
                                <th scope="col">Produto</th>
                                <th scope="col">Quantidade</th>
                            </tr>
                        </thead>
                        <!-- <tbody> -->
                        <?php
                        include("infos/table_storage.php");
                        ?>
                        <!-- <tr>
                                <th scope="row">1000</th>
                                <td>Abajur</td>
                                <td>Limpo queeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeee </td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Jacob</td>
                                <td>Thornton</td>
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
                        </tbody> -->
                    </table>
                </div>
            </div>
        </div>
    </div>

    <?php
    include_once("screen.php");
    ?>



</body>

</html>