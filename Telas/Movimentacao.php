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
    <title>vendas</title>
  </head>
  <body>
    <div class="tela">
      <div class="cabeçalho">
        <h1 class="texto">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Movimentação</h1>
        <img src="logo.jpeg" alt="logo" class="imagem" />
      </div>
      <div class="painel">
        <h1>Movimentação</h1>
        <table>
          <tr>
            <th>data</th>
            <th>produto</th>
            <th>quantidade</th>
            <th>tipo</th>
            <th>preço</th>
          </tr>

          <form method="GET">
            <input type="text" name="pesquisa" placeholder="Pesquise uma movimentação" />
            <input type="submit" value="Pesquisar" name="submit" id="submitId"/>
            
          </form>

          <form action="" method="GET">

          </form>

          <?php
              $sql_code = "SELECT * FROM MOVIMENTACAO";

              if(isset($_GET['pesquisa'])){
                $pesquisa = $mysqli->real_escape_string($_GET['pesquisa']);
                $sql_code .= " WHERE codigo_produto LIKE '%$pesquisa%' 
                OR qtd_movimentada LIKE '%$pesquisa%' OR data LIKE '%$pesquisa%' OR tipo LIKE '%$pesquisa%'";
              }
              $sql_query = $mysqli->query($sql_code) or die("Erro de busca" . $mysqli->error);
              $qtd = $sql_query->num_rows;
              if($qtd == 0){
                echo "<tr><td colspan = '5'>Nenhuma movimentação encontrada</td></tr>";
              }
            
              while($dados = $sql_query->fetch_assoc()){
                echo " 
                <tr>
                <td>${dados['data']}</td>
                <td>${dados['nome']}</td>
                <td>${dados['qtd_movimentada']}</td>
                <td>${dados['tipo']}</td>
                <td>${dados['preco']}</td>
              </tr>";
              }
            ?>

        </table>
        <?php
          include("menu.html");
        ?>
      </div>
    </div>
  </body>
</html>
