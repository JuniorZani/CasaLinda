<?php
  include("../Banco de dados/connectDB.php");
?>


<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <script
      src="https://kit.fontawesome.com/d6fc79058a.js"
      crossorigin="anonymous"
    ></script>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Oswald:wght@500&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" type="text/css" href="../style.css" />
    <title>tela</title>
  </head>
  <body>
    <div class="tela">
      <div class="cabeçalho">
        <h1 class="texto">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Gerador de relatorio</h1>
        <img src="logo.jpeg" alt="logo" class="imagem" />
      </div>
      <div id="quadrado4"><h1>Relatorio</h1>
        <p>Clique para gerar um realtorio de vendas</p>
        <br /><br /><br /><br /><a class="botoes" href="../Informacoes/GerarRelatorio.php"><i class="fa-solid fa-file-lines fa-2xl"></i></div>
      <div class="painel"> 
        <?php
          include("menu.html");
        ?>
      </div>
    </div>
  </body>
</html>
