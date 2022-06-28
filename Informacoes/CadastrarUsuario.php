<?php
  include("../Banco de dados/connectDB.php");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Usuario</title>
</head>
<body>
    <form method="POST">
        <p><label for="nomeId">Nome</label><input type="text" name="nome" id="nome_Id" maxlength="30" required /></p>
        <p><label for="nome_de_usuarioId">Usuário </label><input type="text" name="usuario" id="nome_de_usuarioId" maxlength="20" required /></p>
        <p><label for="senhaId">Senha </label><input type="password" name="senha" id="senhaId" maxlength="15" required /></p>
        <p><label for="senhaConfirmId">Confirmação de Senha</label><input type="password" name="senha_confirm" id="senhaConfirmId" maxlength="15" required /></p>
        
        <p><a href="Produtos.php" >Voltar</a>&nbsp;&nbsp;&nbsp;<input type="submit" value="Cadastrar"/></p>
        
        <?php
            if(!isset($_POST['senha']))
                return;
            $senha = $mysqli->real_escape_string($_POST['senha']);
            $confirma_senha = $mysqli->real_escape_string($_POST['senha_confirm']);
            if($senha != $confirma_senha){
                echo "Senhas diferentes";
                return;
            }

            $usuario = $mysqli->real_escape_string($_POST['usuario']);
            $sql_code = "SELECT * FROM FUNCIONARIOS WHERE nome_de_usuario = '$usuario' ";
            $sql_query = $mysqli->query($sql_code) or die("Erro de inserção" . $mysqli->error);
            
            if($sql_query->num_rows == 0){
                $nome = $mysqli->real_escape_string($_POST['nome']);            
                $sql_code = "INSERT INTO FUNCIONARIOS VALUES ('$usuario', '$nome', '$senha')";
                $sql_query = $mysqli->query($sql_code) or die("Erro de inserção" . $mysqli->error);

                echo "<script>
                    alert(\"Cadastro realizado\");
                    window.location = '../Telas/Configuracoes.php';
                </script>";

            }else
                echo "Usuário já existente";
        ?>
    </form>
</body>
</html>