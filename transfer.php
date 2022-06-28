<?php
include("Banco de Dados/connectDB.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="css/transfer_style.css">
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
                <h4 class="title" style="padding-top: 13px;">MOVIMENTAÇÃO</h4>
            </div>
            <div class="offset-2 col-7 d-flex align-items-center justify-content-end" >
                <div class="d-flex flex-columns align-items-center justify-content-end">
                    <a class="btn btn-style text-center" href="add_transfer.php" data-toggle="tooltip" data-placement="top" title="Adicionar Movimentação">
                        <i class="fa-solid fa-plus-minus fa-xl"></i>
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
                                <th scope="col">Quantidade</th>
                                <th scope="col">Tipo</th>
                                <th scope="col">Preço</th>
                                <th scope="col">Data</th>
                            </tr>
                        </thead>
                        <!-- <tbody> -->
                            <?php
                                include("infos/table_transfer.php");
                            ?>
                            <!-- <tr>
                                <th scope="row">1000</th>
                                <td>Abajur</td>
                                <td>Limpo queeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeee </td>
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
</body>
</html>