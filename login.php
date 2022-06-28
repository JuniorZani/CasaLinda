<?php
    include("Banco de dados/connectDB.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Casa Linda - Login</title>
    <link rel="stylesheet" href="css/login_style.css">
    <link rel="icon" href="img/casa_linda_icon.png" type="image/png" sizes="16x16">
 </head>
<body>
    <div class="content">
        <div class="logo">
            <img src="img/casaLinda_logo.svg" alt="logo" id="logo_company">
        </div>
        </br></br>
        <div class="login">
            <form method="post"> 
                <fieldset id="telaLogin">
                    <input type="text" name="usuario" id="usu" maxlength="8" placeholder="usuario">
                    </br>
                    <input type="password" name="senha" id="pass" maxlength="8" placeholder="senha">
                </fieldset>
                <a >
                <input type="submit" value="login" id="botaoLogin">
                </a>
            </form>

            <?php
                    if(!isset($_POST['usuario']))
                        return;

                    $usuario = $_POST['usuario'];
                    $senha = $_POST['senha'];
                    $sql_code = "SELECT * FROM FUNCIONARIOS WHERE nome_de_usuario='$usuario'";
                    $sql_query = $mysqli->query($sql_code) OR die("Erro ao Logar". $mysqli->error);

                    if($sql_query->num_rows != 0){
                        $user = $sql_query->fetch_assoc();
                        if($senha == $user['senha'])
                            header("Location:dashboard.php");
                        else
                            echo "<script>
                            alert(\"Senha Incorreta\");
                            window.location = 'login.php';
                            </script>";

                    }else{
                        echo "<script>
                        alert(\"Usuário Incorreto\");
                        window.location = 'login.php';
                        </script>";
                    }

            ?>

        </div>
    </div>
</body>
</html>