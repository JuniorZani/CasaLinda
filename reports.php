<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CasaLinda - Relatórios</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="css/sales_style.css">
    <link rel="icon" href="img/casa_linda_icon.png" type="image/png" sizes="16x16">
    <?php
    include("Banco de Dados/connectDB.php");
    include("dashboard_info.php");
    $data = "CURRENT_DATE()";
    include('infos/profit.php');

    $prod_mais_vendido = $prod_vendido_query->fetch_assoc();

    ?>
</head>

<body>
    <div class="container-fluid" id="panel">
        <div class="row" style="height: 10%; padding: 20px 14px;">
            <div class="col-3 d-flex align-items-center">
                <!-- style="padding: 12px 14px;" -->
                <h4 class="title" style="padding-top: 13px;">Relatórios</h4>
            </div>
            <div class="offset-2 col-7 d-flex align-items-center justify-content-end">
                <div class="d-flex flex-columns align-items-center justify-content-end">
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <form class="form-horizontal" method="get">
                        <div class="input-group">
                            <input type="number" class="form-control" placeholder="busque pelo mês" name="mes" id="mes" min="1" max="12">
                            <div class="input-group-btn">
                                <button class="btn btn-default" type="submit" data-toggle="tooltip" data-placement="top" title="Realizar Busca">
                                    <i class="fa-solid fa-calendar-days fa-xl"></i>
                                </button>
                            </div>
                    </form>
                </div>
                &nbsp;&nbsp;&nbsp;&nbsp;
                <a class="btn add-prod text-center" onclick="gerarRelatorio()" ata-toggle="tooltip" data-placement="top" title="Gerar PDF">
                    <i class="fa-solid fa-file-lines fa-xl" style="padding: 0px 3px;"></i>
                </a>
            </div>
        </div>
    </div>
    <div class="row table-row" style="height: 90%">
        <div class="col-12 p-4">
            <div class="table-container table-responsive">
                <table class="table table-borderless table-earnings align-middle">
                    <thead>
                        <tr>
                            <th scope="col">Código</th>
                            <th scope="col">Produto</th>
                            <th scope="col">Quantidade Vendida</th>
                            <th scope="col">Preço</th>
                            <th scope="col">Data Venda</th>
                        </tr>
                    </thead>
                    <?php
                    include("infos/table_reports.php");
                    ?>

                </table>
            </div>
        </div>
    </div>
    </div>

    <?php
    include_once("screen.php");
    ?>

    <script>
        function gerarRelatorio() {
            if (document.querySelector('#mes').value == 0) {
                window.location = "pdf_generator.php?mes=6";
            } else {
                window.location = "pdf_generator.php?mes=" + document.querySelector('#mes').value;
            }
        }
    </script>


</body>

</html>