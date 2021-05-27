<?php

    $emailDestino = $_POST["cli"];

    include ("conta/dadosBanco.php");

    $conexao = mysqli_connect ($servidor, $usuario, $senhaBanco, $banco);

    $query = "SELECT c.cod_cliente FROM cliente c WHERE email LIKE '%$emailDestino%';";

    $resultado = mysqli_query ($conexao, $query);
    $linha = mysqli_fetch_assoc ($resultado);
    $cod_cliente = $linha["cod_cliente"];

    mysqli_close ($conexao);

    $email = "
        <style type='text/css'>
            body {
                font-family: Lora;
                font-size: 15px;
                margin: 0px;
                padding: 0px;
            }
            img {
                width: 60px;
                height: 60px;
                display: inline;
                vertical-align: middle;
            }
            div.cabecalho {
                background-color: #b98753;
                top: -15px;
                position: relative;
            }
            #marca {
                font-size: 30px;
                vertical-align: bottom;
            }
            p {
                margin-left: 5%;
            }
        </style>

        <html>

            <head>
                <link rel='preconnect' href='https://fonts.gstatic.com'>
                <link href='https://fonts.googleapis.com/css2?family=Lora&display=swap' rel='stylesheet'>     
            </head>

            <body>
                <div class='cabecalho'><p><img src='/srv/http/ChessGate/assets/images/icons/logo_icone.svg' type='img/svg'><span id='marca'>ChessGate</span></p></div>
                <p>Foi solicitado uma requisição de senha para a conta associada a esse email! <br />
                Caso não tenha sido você que tenha feito essa solicitação, basta ignorar o email!</p>
                <p>Caso tenha sido você, abra o link a seguir para criar uma nova senha: <a href='teste.html' target='new'>Link</a></p>
            </body>
        </html>
    ";

    $emailEmissor = "chessgate@hotmail.com";
    $assunto = "Recuperação de senha";

    $headers = "MIME-Version: 1.0 \r\nContent-type: text/html; charset=utf-8 \r\nFrom: Chessgate <$emailDestino>";

    $enviarEmail = mail($emailDestino, $assunto, $email, $headers);

    if($enviarEmail)
        echo "Email enviado com sucesso!";
    else
        echo "Erro no envio de email!";

?>