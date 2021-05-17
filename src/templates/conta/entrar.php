<?php 
    
    session_start ();
    if (isset ($_SESSION["logado"])) {
        $nome = $_SESSION["nome"];
        $email = $_SESSION["email"];
        $fone = $_SESSION["fone"];
        $endereco = $_SESSION["endereco"];
        $logado = $_SESSION["logado"];
        header ("location: ../home.php");
    }
    else {
        if ($_GET["cod"] == 401)
            echo "<script>alert ('As credenciais informadas não são válidas!');</script>";

        if ($_GET["cod"]==200)
            echo "<script> alert ('Conta criada com sucesso!')</script>";
    }
?>

<!DOCTYPE html>
<html lang="pt-BR">

    <head>
        <meta charset="utf-8" />
        <title>ChessGate - Entrar</title>
        <link rel="shortcut icon" href="../../../assets/images/icons/logo_icone.svg" type="image/svg" />
        <meta name="description" content="Entra na sua conta para comprar na maior e melhor loja de artigos enxadrístico do país" />
        <meta name="keywords" content="login entrar xadrez loja store" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="stylesheet" href="../../styles/estilos.css" />
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
        <!-- Scripts -->
        <script lang="javascript" type="text/javascript" src="../../scripts/recuperarSenha.js"></script>
    </head>

    <body id="topo">
        <div class="container-fluid px-0">
            <header>
                <div id="cabecalho">
                    <div id="menu_superior_esquerda">
                        <a href="../home.php">
                            <img src="../../../assets/images/icons/logo_icone.svg" type="image/svg" alt="Logomarca" />
                            ChessGate
                        </a>
                    </div>
                    <div id="menu_superior_direita">
                        <span class="pesquisar_icon">
                            <form onsubmit="pesquisar ()">
                                <input onsubmit="pesquisar ();" id="pesquisar_input" type="text" placeholder="Pesquisar" style="font-size: 15px; display: none;" />
                            </form>
                            <img src="../../../assets/images/icons/busca_icone.svg" type="image/svg" alt="Ícone de pesquisa" />
                        </span>
                        <a href="entrar.php">
                            <img src="../../../assets/images/icons/usuario_icone.svg" type="image/svg" alt="Ícone do usuário" />
                            <?php 
                                if ($logado) {
                                    echo $_SESSION["nome"];
                                }
                                else
                                    echo "Entrar";
                            ?>
                        </a>
                    </div>
                </div>
                <div id="menu_navegacao">
                    <ul class="nav justify-content-center">
                        <li id="link_home" class="nav-item">
                            <a class="nav-link" href="../home.php">Home</a>
                        </li>
                        <li id="link_partidas" class="nav-item">
                            <a class="nav-link" href="../partidas.php">Partidas</a>
                        </li>
                        <li id="link_produtos" class="nav-item">
                            <div class="dropdown">
                                <a class="nav-link btn dropdown-toggle" href="#" role="button" id="dropdownProdutos" data-bs-toggle="dropdown" aria-expanded="false">Produtos</a>

                                <ul id="lista_produtos" class="dropdown-menu" aria-labelledby="dropdownProdutos">
                                    <li><a class="dropdown-item" href="../produtos/vitrine.php?categoria=100">Tabuleiros</a></li>
                                    <li><a class="dropdown-item" href="../produtos/vitrine.php?categoria=200">Livros</a></li>
                                    <li><a class="dropdown-item" href="../produtos/vitrine.php?categoria=300">Decorativos</a></li>
                                    <li><a class="dropdown-item" href="../produtos/vitrine.php?categoria=400">Chaveiros</a></li>
                                </ul>
                            </div>
                        </li>
                        <li id="link_carrinho" class="nav-item">
                            <a class="nav-link" href="../carrinho.php">Carrinho</a>
                        </li>
                        <li id="link_conta" class="nav-item">
                            <div class="dropdown">
                                <a class="nav-link btn dropdown-toggle" href="#" role="button" id="dropdownConta" data-bs-toggle="dropdown" aria-expanded="false">Conta</a>
                                <ul id="lista_usuario" class="dropdown-menu" aria-labelledby="dropdownConta">
                                <?php 
                                        if ($logado) {
                                            echo "<li><a class='dropdown-item' href='perfil.php'>Meus dados</a></li>";
                                            echo "<li><a class='dropdown-item' href='sair.php'>Sair</a></li>";
                                        }
                                        else
                                            echo "<li><a class='dropdown-item' href='entrar.php'>Entrar</a></li>";
                                    ?>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </header>

            <main>
                <div id="conteudo" class="cont">
                    <div class="entrar">
                        <p>Entre na ChessGate</p>
                        <form method="post" action="logar.php">
                            <div class="form-group">
                               <label for="txtUsuario">Email</label>
                               <input name="email" type="email" maxlength="30" class="form-control" id="txtUsuario" placeholder="Digite aqui o seu email" required/>
                            </div>
                            <br />
                            <div class="form-group">
                                <label for="txtSenha">Senha</label>
                                <input name="senha" type="password" maxlength="30" class="form-control" id="txtSenha" placeholder="Digite aqui a sua senha" aria-labelledby="senhaAjuda" required/>
                                <small id="senhaAjuda" class="form-text text-muted">
                                    <p style="font-size: 15px;">Proteja a sua senha! Não compartilhe com ninguém!</p>
                                </small>
                            </div>
                            <button name="btnLogar" id="btn_entrar" type="submit" class="btn btn-lg btn-block">Entrar</button>
                        </form>
                        <button id="btn_esqueci" type="button" class="btn" data-bs-toggle="modal" data-bs-target="#esqueciSenha">
                            Esqueceu a senha?
                        </button>
                    </div>
                    <div class="cadastrar">
                        <p>Cadastrar</p>
                        <p>Não possui uma conta? Não perca tempo, cadastre-se agora mesmo!</p>
                        <a id="btn_cadastrar" href="cadastrar.php" class="btn btn-lg bt-block" role="button" aria-pressed="false">Cadastrar</a>
                    </div>
                </div>
            </main>

            <footer>
                <div id="rodape">
                    <div id="conteudo_rodape">
                        <div id="p_col">
                            <ul>
                                <li><a href="#topo">Topo</a></li>
                                <li><a href="../home.php">Home</a></li>
                                <?php 
                                    if ($logado)
                                        echo "<li><a href='conta/perfil.php'>Conta</a></li>";
                                    else
                                        echo "<li><a href='conta/entrar.php'>Entrar</a></li>";
                                ?>
                                <li><a href="../produtos/vitrine.php?categoria=100">Tabuleiros</a></li>
                            </ul>
                        </div>
                        <div id="s_col">
                            <ul>
                                <li><a href="../produtos/vitrine.php?categoria=200">Livros</a></li>
                                <li><a href="../produtos/vitrine.php?categoria=300">Decorativos</a></li>
                                <li><a href="../produtos/vitrine.php?categoria=400">Chaveiros</a></li>
                                <li><a href="../partidas.php">Partidas</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </body>

</html>

<script lang="javascript">
    
    $(window).scroll(function () {
        
        var scroll = $(window).scrollTop();
        var cabecalhoOffset = $("#menu_navegacao").offset().top;

        if (scroll >= cabecalhoOffset)
            $("#menu_navegacao").css("position","fixed").css("top","0");

        if (cabecalhoOffset <= $("#cabecalho").offset().top)
            $("#menu_navegacao").css("position","relative").css("top","auto");
    });

    $("#link_produtos").mouseenter( function () {
        $("#lista_produtos").toggle();
    });

    $("#link_produtos").mouseleave ( function () {
        $("#lista_produtos").toggle();
    });

    $("#link_conta").mouseenter ( function () {
        $("#lista_usuario").toggle();
    })

    $("#link_conta").mouseleave ( function () {
        $("#lista_usuario").toggle();
    })

    $(document).ready( function () {

        var busca = document.getElementById("pesquisar_input");
        busca.value = "";

        var largura_atual = $(window).width();

        if (largura_atual < 576) {
            $("#pesquisar_input").attr("size","2.5");
            return false;
        }

        if ((largura_atual >= 576 && largura_atual < 768)) {
            $("#pesquisar_input").attr("size","5");
            return false;
        }

        if ((largura_atual >= 768 && largura_atual < 992)) {
            $("#pesquisar_input").attr("size","7.5");
            return false;
        }

        if ((largura_atual >= 992 && largura_atual < 1200)) {
            $("#pesquisar_input").attr("size","10");
            return false;
        }

        if((largura_atual >= 1200)) {
            $("#pesquisar_input").attr("size","12.5");
            return false;
        }
    })

    $(window).on("resize", function () {

        $("#pesquisar_input").fadeOut(100);
        
        var largura_atual = $(window).width();

        if (largura_atual < 576) {
            $("#pesquisar_input").attr("size","2.5");
            return false;
        }

        if ((largura_atual >= 576 && largura_atual < 768)) {
            $("#pesquisar_input").attr("size","5");
            return false;
        }

        if ((largura_atual >= 768 && largura_atual < 992)) {
            $("#pesquisar_input").attr("size","7.5");
            return false;
        }

        if ((largura_atual >= 992 && largura_atual < 1200)) {
            $("#pesquisar_input").attr("size","10");
            return false;
        }

        if((largura_atual >= 1200)) {
            $("#pesquisar_input").attr("size","12.5");
            return false;
        }

    })

    $(".pesquisar_icon").click ( function () {
            var busca = document.getElementById("pesquisar_input");
            busca.value = "";
            $("#pesquisar_input").fadeIn(100);
            $("#pesquisar_input").focus();
    })

    $(document).on("click", function (event) {
        if(!$(event.target).closest(".pesquisar_icon").length) {
            $("#pesquisar_input").fadeOut(100);
            var busca = document.getElementById("pesquisar_input");
            busca.value = "";
        }
    })
</script>

<script lang="javascript">

    function pesquisar () {
        var busca = document.getElementById("pesquisar_input");

        alert(busca.value);
    }
</script>

<div class="modal fade" id="esqueciSenha" tabindex="-1" role="dialog" style="z-index: 1500;">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabel">Esqueci minha senha! E agora?</h5>
                <button type="button" class="close" data-bs-dismiss="modal" arial-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Caso você tenha esquecido a sua senha, informe o email da sua conta para que podemos recuperá-la</p>
                <input type="email" id="emailRecuperar" class="form-control" maxlength="30" required placeholder="Informe o seu email" />
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                <button type="button" onclick="recuperar ();" class="btn btn-danger">Recuperar senha</button>
            </div>
        </div>
    </div>
</div>