<?php 
    
    include ("dadosBanco.php");
    

    if (isset ($_POST["btnCadastro"])) {
        $nome = $_POST["nome"];
        $email = $_POST["email"];
        $senha = md5 ($_POST["senha"]);
        $dt_nascimento = $_POST["dt_nascimento"];
        $fone = $_POST["fone"];
        $genero = $_POST["radGenero"];
        $endereco = $_POST["endereco"];

        $conexao = mysqli_connect ($servidor,$usuario,$senhaBanco,$banco);

        if (!$conexao)
            die ("Conexão falhou: " . mysqli_connect_error ());
        else {
            //echo "Conexão bem sucedida!";

            $query = "INSERT INTO cliente (nome,email,senha,dt_nascimento,fone,genero,endereco)
            VALUES ('$nome', '$email', '$senha', $dt_nascimento, '$fone', '$genero', '$endereco');";

            if (mysqli_query ($conexao, $query)) {
                
                /*session_start ();
                $_SESSION["nome"] = $nome;
                $_SESSION["email"] = $email;
                $_SESSION["senha"] = $senha;
                $_SESSION["fone"] = $fone;
                $_SESSION["endereco"] = $endereco;
                $_SESSION["logado"] = true;*/

                header ("location: entrar.php?cod=200");
            }
            else
                //echo "Error: " . $query . "<br>" . mysqli_error($conexao);
                header ("location: cadastrar.php?cod=501");
    
        }

        mysqli_close ($conexao);
        exit ();
    }
    else
        header ("location: ../home.php");
?>