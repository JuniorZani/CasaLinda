<?php
include("Banco de dados/connectDB.php");
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nova Movimentação</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="css/add_transfer_style.css">
    <link rel="icon" href="img/casa_linda_icon.png" type="image/png" sizes="16x16">
</head>

<body>

    <?php
    include_once("screen.php");
    ?>

    <div class="container-fluid" id="panel">
        <div class="row" style="height: 10%; padding-top: 20px; padding-left: 10px">
            <div class="col-5 d-flex align-items-center">
                <a class="btn back-prod text-center" href="transfer.php" title="Voltar para Movimentação">
                    <i class="fa-solid fa-arrow-left fa-lg"></i>
                </a>
                &nbsp;&nbsp;&nbsp;
                <h4 class="title" style="padding-top: 13px;">Adicionar Movimentação</h4>
            </div>
        </div>

        <div class="row" style="height: 90%; padding-bottom: 30px">
            <div class="col-6 offset-3 d-flex justify-content-center align-items-center">

                <script>
                    function produtoDefeituoso() {
                        if (document.getElementById('defeitoId').checked)
                            document.getElementById('tipo_id').setAttribute("disabled", "disabled");

                        else
                            document.getElementById('tipo_id').removeAttribute("disabled");
                    }
                </script>

                <form class="" method="GET" style="margin: 0 50px">

                    <div class="row form-group">
                        <div class="col-6">
                            <label for="codigo_produtoId">Código do Produto</label>
                            <input class="form-control" type="text" name="codigo_produto" id="codigo_produtoId" maxlength="4" required />
                        </div>
                        <div class="col-6">
                            <label for="data_Id">Data </label>
                            <input class="form-control" type="date" name="data" id="data_Id" required />
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-6">
                            <label for="quantidade_Id">Quantidade </label>
                            <input class="form-control" type="number" name="quantidade" id="quantidade_Id" required />
                        </div>
                        <div class="col-6">
                            <label for="tipo_id">Tipo </label>
                            <select class="form-select" name="tipo" id="tipo_id">
                                <option value='E'>Entrada</option>
                                <option value='S'>Saida</option>
                            </select>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-12">
                            <input class="form-check-input" type="checkbox" id='defeitoId' name='defeito' onclick="produtoDefeituoso()">
                            <label class="form-check-label" for="defeitoId">Produto Defeituoso</label>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-12">
                        </div>
                    </div>
                    <input class="submit" type="submit" value="Adicionar" />

                    <?php
                    if (!$_GET)
                        return;

                    $pageWasRefreshed = isset($_SERVER['HTTP_CACHE_CONTROL']) && $_SERVER['HTTP_CACHE_CONTROL'] === 'max-age=0';
                    if ($pageWasRefreshed) {
                        header('Location: add_transfer.php');
                    }

                    $codigo = $mysqli->real_escape_string($_GET['codigo_produto']);
                    $produtos_code = "SELECT * FROM PRODUTOS WHERE codigo = '$codigo'";
                    $produtos_query = $mysqli->query($produtos_code) or die("Erro de inserção" . $mysqli->error);
                    $produto = $produtos_query->fetch_assoc();
                    if ($produtos_query->num_rows != 0) {

                        $sql_code = "SELECT * FROM ESTOQUE WHERE codigo_produto='$codigo'";
                        $sql_query = $mysqli->query($sql_code) or die("Erro de Busca" . $mysqli->error);
                        $qnt = $sql_query->fetch_assoc();
                        $data = $mysqli->real_escape_string($_GET['data']);
                        $quantidade = ($_GET['quantidade']);

                        $mov_code = "INSERT INTO MOVIMENTACAO (codigo_produto, tipo, qtd_movimentada, data, preco, nome)
            VALUES ('$codigo',";

                        if (!$_GET['defeito']) {
                            $tipo = $mysqli->real_escape_string($_GET['tipo']);
                            $mov_code .= " '$tipo', $quantidade, '$data'";
                            if ($tipo == 'S') {
                                if (($qnt['qtd_estocada'] - $quantidade) < 0) {
                                    echo "<script>
                        alert(\"Quantidade de Estoque Insuficiente\");
                        window.location = 'add_transfer.php';
                        </script>";
                                    return;
                                }
                                $mov_code .= ", '${produto['preco_venda']}',";
                            } else
                                $mov_code .= ", '${produto['preco_custo']}',";
                        } else {
                            if (($qnt['qtd_estocada'] - $quantidade) < 0) {
                                echo "<script>
                alert(\"Quantidade de Estoque Insuficiente\");
                window.location = 'add_transfer.php';
                </script>";
                                return;
                            }
                            $mov_code = "INSERT INTO MOVIMENTACAO (codigo_produto, tipo, qtd_movimentada, data, preco, nome)
                VALUES ('$codigo', 'S', $quantidade, '$data', 0, ";
                            echo "$data";
                        }
                        $mov_code .= " '${produto['nome']}') ";
                        $mov_query = $mysqli->query($mov_code) or die("Erro de inserção<br/>" . $mysqli->error);

                        echo "<script>
                    alert(\"Movimentação Realizada\");
                    window.location = 'add_transfer.php';
                </script>";
                    } else {
                        echo "<script>
                alert(\"Produto inexistente\");
                window.location = 'add_transfer.php';
            </script>";
                    }
                    ?>
                    </script>
                </form>
            </div>
        </div>
    </div>
</body>

</html>