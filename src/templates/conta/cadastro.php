<?php 
    if (isset ($_POST["btnCadastro"])) {
        $nome = $_POST["nome"];
        $email = $_POST["email"];
        $senha = md5 ($_POST["senha"]);
        $dt_nascimento = $_POST["dt_nascimento"];
        $fone = $_POST["fone"];
        if ($_POST["masculino"])
            $genero = 'M';
        else if ($_POST["feminino"])
            $genero = 'F';
        else
            $genero = 'B';
        $endereco = $_POST["endereco"];

        
    }
    else
        header ("location: ../home.php");
?>