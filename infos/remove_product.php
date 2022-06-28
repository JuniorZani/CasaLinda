<?php
    include("../Banco de dados/connectDB.php");
    $id = $mysqli->real_escape_string($_GET['id']);
    $sql_code = "DELETE FROM ESTOQUE WHERE codigo_produto= '$id' ";
    $sql_query = $mysqli->query($sql_code) OR die("Erro na remoção" . $mysqli->error);

    $sql_code = "DELETE FROM PRODUTOS WHERE codigo= '$id' ";
    $sql_query = $mysqli->query($sql_code) OR die("Erro na remoção" . $mysqli->error);
    header('Location: ../products.php');
?>