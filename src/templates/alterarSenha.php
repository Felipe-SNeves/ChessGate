<?php

    $cod_cliente = $_POST["codigo_cliente"];
    $novaSenha = md5($_POST["novaSenha"]);

    include ('./conta/dadosBanco.php');

    $conexao = mysqli_connect ($servidor, $usuario, $senhaBanco, $banco);

    $query = "UPDATE cliente
    SET senha='$novaSenha'
    WHERE cod_cliente=$cod_cliente;";

    mysqli_query ($conexao, $query);

    mysqli_close ($conexao);

    header ('location: home.php?cod=200');
?>