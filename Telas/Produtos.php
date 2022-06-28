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
    <script type="text/javascript" src="script.js"></script>
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
    <title>produtos</title>
  </head>
  <body>
    <div class="tela">
      <div class="cabeçalho">
        <h1 class="texto">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Produtos</h1>
        <img src="logo.jpeg" alt="logo" class="imagem" />
      </div>
      <div class="painel">
        <h1>Lista De Produtos</h1>
        <table id="tabProdutos">
          
          <form method="GET">
          
          <input type="submit" value="Busca" id="buscaButton" />
          <input type="text" id="botaoBusca" name="pesquisa" />

          <tr>
            <th>codigo</th>
            <th>produto</th>
            <th>descrição</th>
            <th>categoria</th>
            <th>fornecedor</th>
            <th>preço custo</th>
            <th>preço venda</th>
            <th>opções</th>

          </tr>

          <?php
            include_once "../Informacoes/TabelaProdutos.php";
          ?>

          </form>

          <form id="cadastra_produto" action="../Informacoes/CadastrarProduto.php" method="GET">
            <a href="../Informacoes/CadastrarProduto.php">cadastro produtos</a> 
            <input type="button" value="Cadastro Produtos" id="botaoCadastro" />
          </form>

        </table>

        <?php
        include("menu.html");
        ?>
      
      </div>
    </div>

    <script>
      function removerProduto(id){
        if(confirm("Deseja remover o produto?")){
          window.location = "../Informacoes/RemoverProduto.php?id=" + id;
        }
      }
      function alteraProduto(id){
        window.location = "../Informacoes/AlterarProduto.php?id=" + id;
      }
      
    </script>
  </body>
</html>