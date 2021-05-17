<?php 

    include ("dadosBanco.php");

    if (isset ($_POST["btnLogar"])) {
        $conexao = mysqli_connect ($servidor, $usuario, $senhaBanco, $banco);

        if (!$conexao)
            die ("Conexão falhou: " . mysqli_connect_error ());
        else {
            $email = $_POST["email"];
            $senha = md5 ($_POST["senha"]);

            $query = "SELECT nome, email, senha, fone, endereco FROM cliente
            WHERE email LIKE '$email' AND senha LIKE '$senha';";

            $resultado = mysqli_query ($conexao, $query);

            if (mysqli_num_rows ($resultado) > 0) {
                $linha = mysqli_fetch_assoc ($resultado);

                session_start ();
                $_SESSION["logado"] = true;
                $_SESSION["nome"] = $linha["nome"];
                $_SESSION["email"] = $linha["email"];
                $_SESSION["fone"] = $linha["fone"];
                $_SESSION["endereco"] = $linha["endereco"];

                header ("location: ../home.php");
                
            }
            else
                header ("location: entrar.php?cod=401");
        }
    }

?>