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
    <title>produtos</title>
  </head>
  <body>
    <div class="tela">
      <div class="cabeçalho">
        <h1 class="texto">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Estoque</h1>
        <img src="logo.jpeg" alt="logo" class="imagem" />
      </div>
      <div class="painel">
        <h1>Estoque</h1>

      <form action="" method="POST">

          <input type="text" placeholder="Digite a palavra chave" name="pesquisa">
          <input type="button" value="Buscar no Estoque" id="buscaEstoque">
        
        <table id="tabelaEstoque">
          <tr>
            <th>codigo</th>
            <th>produto</th>
            <th>quantidade</th>
          </tr>
          
          <?php
              $sql_code = "SELECT * FROM ESTOQUE";

              if(isset($_POST['pesquisa'])){
                $pesquisa = $mysqli->real_escape_string($_POST['pesquisa']);
                $sql_code .= " WHERE codigo_produto LIKE '%$pesquisa%' OR nome_produto LIKE '%$pesquisa%' 
                OR qtd_estocada LIKE '%$pesquisa%'";
              }
              $sql_query = $mysqli->query($sql_code) or die("Erro de busca" . $mysqli->error);
              $qtd = $sql_query->num_rows;
              if($qtd == 0){
                echo "<tr><td colspan = '7'>Nenhum produto no estoque</td></tr>";
              }
            
              while($dados = $sql_query->fetch_assoc()){
                echo " 
                <tr>
                <td>${dados['codigo_produto']}</td>
                <td>${dados['nome_produto']}</td>
                <td>${dados['qtd_estocada']}</td>
              </tr>";
              }

            ?>

        </table>
      </form>

      <?php
          include("menu.html");
        ?>
      
    </div>
    </div>
  </body>
</html>
