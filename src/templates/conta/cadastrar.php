<?php 
    
    session_start ();
    if (isset ($_SESSION["logado"])) {
        $nome = $_SESSION["nome"];
        $email = $_SESSION["email"];
        $fone = $_SESSION["fone"];
        $endereco = $_SESSION["endereco"];
        $logado = $_SESSION["logado"];
        $cod_cliente = $_SESSION["cod_cliente"];
        header ("location: ../home.php");
    }
    else {
        if ($_GET["cod"]==501)
            echo "<script> alert ('Não foi possível criar uma conta! Tente novamente!')</script>";
    }
?>

<!DOCTYPE html>
<html lang="pt-BR">

    <head>
        <meta charset="utf-8" />
        <title>ChessGate - Cadastrar</title>
        <link rel="shortcut icon" href="../../../assets/images/icons/logo_icone.svg" type="image/svg" />
        <meta name="description" content="Crie uma conta na ChessGate" />
        <meta name="keywords" content="cadastro criar conta xadrez loja store" />
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
        <script lang="javascript" type="text/javascript" src="../../scripts/validarCadastro.js"></script>
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
                            <form method="get" action="../produtos/busca.php">
                                <input name="prod" id="pesquisar_input" type="text" placeholder="Pesquisar" style="font-size: 15px; display: none;" />
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
                <div id="conteudo" class="cad">
                    <p>Cadastrar</p>
                    <div id="form">
                        <p>Preencha os campos abaixo para criar uma conta</p>
                        <form class="row g-3" method="post" action="cadastro.php">
                            <div class="col-md-6">
                                <label for="txtNome" class="form-label">Nome</label>
                                <input name="nome" type="text" maxlength="30" class="form-control" id="txtNome" placeholder="Digite seu nome de usuário" required />                             
                            </div>
                            <div class="col-md-6">
                                <label for="txtEmail" class="form-label">Email</label>
                                <input name="email" type="email" maxlength="30" class="form-control" id="txtEmail" placeholder="Digite seu email" required />
                            </div>
                            <div class="col-md-4">
                                <label for="txtSenha" class="form-label">Senha</label>
                                <input name="senha" type="password" minlength="8" maxlength="30" class="form-control" id="txtSenha" placeholder="Digite uma senha" required />
                            </div>
                            <div class="col-md-4">
                                <label for="cSenha" class="form-label">Confirmar senha</label>
                                <input type="password" minlength="8" maxlength="30" class="form-control" id="cSenha" placeholder="Confirme a senha informada" required />
                            </div>
                            <div class="col-md-4">
                                <label for="dtNascimento" class="form-label">Data de nascimento</label>
                                <input name="dt_nascimento" type="date" class="form-control" id="dtNascimento" required />
                            </div>
                            <div class="col-md-4">
                                <label for="txtTelefone" class="form-label">Telefone</label>
                                <input name="fone" type="text" pattern="[0-9]{8,9}" class="form-control" id="txtTelefone" minlength="8" maxlength="9" placeholder="Digite seu número de telefone" required />
                            </div>
                            <div class="col-md-3">
                                Gênero
                                <div class="form-check">
                                    <input value='M' class="form-check-input" type="radio" name="radGenero" id="masculino" required />
                                    <label class="form-check-label" for="masculino">Masculino</label>
                                </div>
                                <div class="form-check">
                                    <input value='F' class="form-check-input" type="radio" name="radGenero" id="feminino" required />
                                    <label class="form-check-label" for="feminino">Feminino</label>
                                </div>
                                <div class="form-check">
                                    <input value='N' class="form-check-input" type="radio" name="radGenero" id="nbinario" required />
                                    <label class="form-check-label" for="nbinario">Não binário</label>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <label class="form-label" for="txtEndereco">Endereço</label>
                                <input name="endereco" type="text" maxlength="40" class="form-control" id="txtEndereco" placeholder="Informe o seu endereço" required />
                            </div>
                            <div class="col-12">
                                <input class="form-check-input" type="checkbox" value="" id="termos" required />
                                <label class="form-check-label" for="termos">Aceito os Termos, Política de Dados e Política de Cookies</label>
                            </div>
                            <div class="col-12">
                                <button name="btnCadastro" class="btn btn-lg" type="submit" onclick="validar ();">Cadastrar</button>
                            </div>
                        </form>
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
                                        echo "<li><a href='perfil.php'>Conta</a></li>";
                                    else
                                        echo "<li><a href='entrar.php'>Entrar</a></li>";
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
