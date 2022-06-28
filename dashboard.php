<?php
include("Banco de Dados/connectDB.php");
include("dashboard_info.php");
$data = "CURRENT_DATE()";
include("infos/profit.php")
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Casa Linda - Painel</title>
  <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
  <link rel="stylesheet" href="css/dashboard_style.css">
  <link rel="icon" href="img/casa_linda_icon.png" type="image/png" sizes="16x16">
</head>

<body>
  <div class="container-fluid" id="panel">
    <div class="row d-flex justify-content-center align-items-center text-center" style="height: 10%">
      <h5 style="margin-bottom: 0">Olá, Livia</h5>
    </div>
    <div class="row upper-row pb-4" style="height: 30%">
      <div class="col-4">
        <div class="card h-100 d-flex justify-content-center align-items-center text-center ">
          <h4 class="card-title">Vendas Mensais</h4>
          <?php
            echo "<h1 class=\"card-text\">$vendas_mensais</h1>"
          ?>
        </div>
      </div>
      <div class="col-4">
        <div class="card h-100 d-flex justify-content-center align-items-center text-center ">
          <h4 class="card-title">Qntd. de Produtos</h4>
          <?php 
            echo "<h1 class=\"card-text\">$produtos_cadast</h1>";
          ?>
        </div>
      </div>
      <div class="col-4">
        <div class="card h-100 d-flex justify-content-center align-items-center text-center ">
          <h4 class="card-title">Lucro Mensal (Liq.)</h4>
          <?php
            echo "<h1 class=\"card-text\">R$ $lucro</h1>"
          ?>
        </div>
      </div>
    </div>
    <div class="row lower-row pt-4 pb-5" style="height: 60%; flex-wrap: nowrap;">
      <div class="col-6">
        <div class="card card-most-sell h-100 d-flex justify-content-start">
          <h4 class="card-title" style="padding-bottom: 12px;">Produtos mais Vendidos</h4>
          <ul>
            <?php
              $cont = 0;
              while($prod_mais_vendidos = $prod_vendido_query->fetch_assoc()){
                if($cont == 5)
                  break;
                echo "<li>${prod_mais_vendidos['nome']}</li>";
                $cont++;
              }
            ?>
          </ul>
        </div>
      </div>
      <div class="col-6">
        <div class="card card-prod-restock h-100 overflow-auto d-flex justify-content-start">
          <div class="d-flex justify-content-between">
            <h4 class="card-title" >Produtos à Repor</h4>
            <?php
              echo "<h1 class=\"card-text\">$repor_qntd</h1>";
            ?>
          </div>
          <ul>
            <?php
              if ($repor_qntd == 0){
                echo "<li>Nenhum produto para reposição</li>";
              }else
                while($repor = $repor_query->fetch_assoc()){
                  echo "<li>${repor['nome_produto']}</li>";
                }
            ?>
          </ul>
        </div>
      </div>
    </div>
  </div>

  <?php
  include_once("screen.php");
  ?>

  <!-- <div id="quadrado1">
    <h1>Vendas Mensais</h1>
  </div>
  <div id="quadrado2">
    <h1>Produtos à repor</h1>
  </div>
  <div id="quadrado3">
    <h1>Lucro Mensal</h1>
  </div>
  <div id="quadrado4">
    <h1>&nbsp;Produtos mais Vendidos</h1>
  </div>
  <div id="quadrado5">
    <h1>&nbsp;Produtos mais Vendidos</h1>
  </div> -->
</body>

</html>