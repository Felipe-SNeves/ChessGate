<?php

    session_start ();
    if (isset ($_SESSION["logado"])) {
        $nome = $_SESSION["nome"];
        $email = $_SESSION["email"];
        $fone = $_SESSION["fone"];
        $endereco = $_SESSION["endereco"];
        $logado = $_SESSION["logado"];
        $cod_cliente = $_SESSION["cod_cliente"];
    }

    include ('conta/dadosBanco.php');

    $cod_pedido = session_id();

    $conexao = mysqli_connect ($servidor, $usuario, $senhaBanco, $banco);

    $query = "DELETE FROM carrinho WHERE cod_cliente=$cod_cliente AND cod_pedido='$cod_pedido';";

    mysqli_query ($conexao, $query);

    mysqli_close($conexao);

    echo true;
?>