<?php

    $emailDestino = $_POST["cli"];

    include ("conta/dadosBanco.php");

    $conexao = mysqli_connect ($servidor, $usuario, $senhaBanco, $banco);

    $query = "SELECT c.cod_cliente FROM cliente c WHERE email LIKE '%$emailDestino%';";

    $resultado = mysqli_query ($conexao, $query);
    $linha = mysqli_fetch_assoc ($resultado);
    $cod_cliente = $linha["cod_cliente"];

    mysqli_close ($conexao);

    if ($cod_cliente=="")
        exit ();

    $corpo = "
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
                <div class='cabecalho'><p><span id='marca'>ChessGate</span></p></div>
                <p>Foi solicitado uma requisição de senha para a conta associada a esse email! <br />
                Caso não tenha sido você que tenha feito essa solicitação, basta ignorar o email!</p>
                <p>Caso tenha sido você, abra o link a seguir para criar uma nova senha: <a href='http://localhost/ChessGate/src/templates/recuperarSenha.php?token_cliente=$cod_cliente' target='new'>Link</a></p>
            </body>
        </html>
    ";


  

        //Import PHPMailer classes into the global namespace
        //These must be at the top of your script, not inside a function
        use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\SMTP;
        use PHPMailer\PHPMailer\Exception;
        
        //Load Composer's autoloader
        require '../../vendor/autoload.php';
        
        //Instantiation and passing `true` enables exceptions
        $mail = new PHPMailer(true);
        
        try {
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp-mail.outlook.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                                          //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
        
            //Recipients
            $mail->setFrom('chessgate@hotmail.com', 'ChessGate');
            $mail->addAddress($emailDestino);     //Add a recipient
            
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Resgatar conta';
            $mail->Body    = $corpo;
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        
            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }

?>