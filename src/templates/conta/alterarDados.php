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

    if ($_POST["operacao"]==1) {
        $_SESSION["nome"] = $_POST["newData"];
        
        $newData = $_POST["newData"];

        include ('dadosBanco.php');

        $conexao = mysqli_connect ($servidor, $usuario, $senhaBanco, $banco);

        $query = "UPDATE cliente
        SET nome='$newData'
        WHERE cod_cliente=$cod_cliente";

        mysqli_query ($conexao, $query);

        mysqli_close ($conexao);

        echo $_POST["newData"];
    }
    else if ($_POST["operacao"]==2) {
        $_SESSION["email"] = $_POST["newData"];
        
        $newData = $_POST["newData"];

        include ('dadosBanco.php');

        $conexao = mysqli_connect ($servidor, $usuario, $senhaBanco, $banco);

        $query = "UPDATE cliente
        SET email='$newData'
        WHERE cod_cliente=$cod_cliente";

        mysqli_query ($conexao, $query);

        mysqli_close ($conexao);

        echo $_POST["newData"];
    }
    else if ($_POST["operacao"]==3) {
        $newData = md5 ($_POST["newData"]);

        include ('dadosBanco.php');

        $conexao = mysqli_connect ($servidor, $usuario, $senhaBanco, $banco);

        $query = "UPDATE cliente
        SET senha='$newData'
        WHERE cod_cliente=$cod_cliente";

        mysqli_query ($conexao, $query);

        mysqli_close ($conexao);

        echo true;
    }
    else if ($_POST["operacao"]==4) {
        $_SESSION["fone"] = $_POST["newData"];
        
        $newData = $_POST["newData"];

        include ('dadosBanco.php');

        $conexao = mysqli_connect ($servidor, $usuario, $senhaBanco, $banco);

        $query = "UPDATE cliente
        SET fone='$newData'
        WHERE cod_cliente=$cod_cliente";

        mysqli_query ($conexao, $query);

        mysqli_close ($conexao);

        echo $_POST["newData"];
    }
    else if ($_POST["operacao"]==5) {
        $_SESSION["endereco"] = $_POST["newData"];
        
        $newData = $_POST["newData"];

        include ('dadosBanco.php');

        $conexao = mysqli_connect ($servidor, $usuario, $senhaBanco, $banco);

        $query = "UPDATE cliente
        SET endereco='$newData'
        WHERE cod_cliente=$cod_cliente";

        mysqli_query ($conexao, $query);

        mysqli_close ($conexao);

        echo $_POST["newData"];
    }
?>