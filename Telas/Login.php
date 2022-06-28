<?php
    include("../Banco de dados/connectDB.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="../styleLogout.css">
    <link
      href="https://fonts.googleapis.com/css2?family=Oswald:wght@500&display=swap"
      rel="stylesheet"
    />
 </head>
<body>
    <div id="tela">
        <div class="cabeçalho">
            <h1 class="texto">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;LOGIN</h1>
        </div>
            <div>
                <form method="POST"> 
                    <fieldset id="telaLogin"><legend></br>Indentificação de usuario</legend>
                       <p>usuario:</br><input type="text" name="usuario" id="usu" size="20" maxlength="8" placeholder="login do usuario" required ></p>
                       <p>Senha:</br><input type="password" name="senha" id="pass" size="20" maxlength="8" placeholder="senha do usuario" required ></p>
                    </fieldset>
                    <a href="Main.php">
                    <input type="submit" value="login" id="botaoLogin">
                    </a>
                </form>
                <?php
                    if(!isset($_POST['usuario']))
                        return;
                    $usuario = $_POST['usuario'];
                    $senha = $_POST['senha'];
                    $sql_code = "SELECT * FROM FUNCIONARIOS WHERE nome_de_usuario='$usuario' AND senha ='$senha'";
                    $sql_query = $mysqli->query($sql_code) OR die("Erro ao Logar". $mysqli->error);

                    if($sql_query->num_rows != 0){
                        header("Location:Main.php");
                    }
                ?>

            </div>
        </div>
</body>
</html>