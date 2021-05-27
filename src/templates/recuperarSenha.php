<?php
    if (!isset ($_GET["token_cliente"])) {
        header ("location: home.php");
        exit();
    }

    $cod_cliente = $_GET["token_cliente"];
?>

<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="utf-8" />
        <title>Recuperar senha</title>
        <link rel="shortcut icon" href="../../assets/images/icons/logo_icone.svg" type="image/svg" />
        <meta name="description" content="Recuperar senha" />
        <meta name="keywords" content="xadrez loja tabuleiro chaveiro decorativo livro senha recuperar" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="stylesheet" href="../styles/estilos.css" />
        <!-- JQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> 
        <!-- Inserção do Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
        <!-- Inclusão de fontes -->
        <!-- Conexão com o google fonts -->
        <link rel="preconnect" href="https://fonts.gstatic.com"> 
        <!-- Lora -->
        <link href="https://fonts.googleapis.com/css2?family=Lora&display=swap" rel="stylesheet">
        <style>
            .recuperarSenha {
                font-size: 20px;
                margin-top: 2%;
            }

            form {
                margin-top: 2%;
            }

            #cod_cliente {
                visibility: hidden;
                position: absolute;
            }
        </style>
        <script src="../scripts/validarNovaSenha.js" lang="text/javascript"></script>
    </head>

    <body>
        <?php echo "<script>var cod_cliente = $cod_cliente</script>"; ?>
        <div class="container-fluid px-0">
            <header>
                <div id="cabecalho">
                    <div id="menu_superior_esquerda">
                        <a href="home.php">
                            <img src="../../assets/images/icons/logo_icone.svg" type="image/svg" alt="Logomarca" />
                            ChessGate
                        </a>
                        - Recuperar Senha
                    </div>
                </div>
            </header>
            <div class="container recuperarSenha">
                Para recuperar o acesso a conta é necessário <b>cadastrar</b> uma nova senha:
                <form method="post" action="alterarSenha.php">
                    <div class="col-md-4 mb-3">
                        <label for="txtSenha" class="form-label">Nova senha</label>
                        <input name="novaSenha" type="password" minlength="8" maxlength="30" class="form-control" id="txtSenha" placeholder="Digite uma nova senha" required />
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="cSenha" class="form-label">Confirmar senha informada</label>
                        <input type="password" minlength="8" maxlength="30" class="form-control" id="cSenha" placeholder="Confirme a senha informada" required />
                    </div>
                        <input name="codigo_cliente" type="text" readonly id="cod_cliente" required />
                    <button style="background-color: #b98753;" name="btnRestaurarSenha" class="btn btn-lg" type="submit" onclick="validarNovaSenha ();">Cadastrar</button>
                </form>
            </div>
        </div>
    </body>
</html>
<script>document.getElementById ('cod_cliente').value = cod_cliente</script>